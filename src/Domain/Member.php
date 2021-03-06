<?php
namespace Gyman\Domain;

use Carbon\Carbon;
use DateTime;
use Doctrine\Common\Collections\Collection;
use Gyman\Domain\Calendar\Event\Occurrence;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;
use Gyman\Application\Exception\MemberHasNoLastEntryException;
use Gyman\Application\Exception\NoCurrentVoucherForVoucherEntryException;
use Gyman\Application\Exception\VouchersAreOverlappingException;
use Gyman\Domain\Member\Details;
use Gyman\Domain\Member\EmailAddress;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Member
 * @package Gyman\Domain
 */
class Member
{
    /**
     * @var UuidInterface
     */
    protected $id;

    /**
     * @var EmailAddress
     */
    protected $email;

    /**
     * @var Details
     */
    protected $details;

    /**
     * @var ArrayCollection|Section[] // remove this
     */
    protected $sections;

    /**
     * @var ArrayCollection|Voucher[]
     */
    protected $vouchers;

    /**
     * @var Voucher
     */
    protected $currentVoucher;

    /**
     * @var Entry
     */
    protected $lastEntry;

    /**
     * @var ArrayCollection|Entry[]
     */
    protected $entries;

    /**
     * @var string
     */
    private $nameSlug;

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * @var DateTime
     */
    private $updatedAt;

    /**
     * @var Datetime $deletedAt
     */
    private $deletedAt;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $salt;

    /**
     * @return bool
     */
    public function hasOpenedEntry() : bool
    {
        return !is_null($this->lastEntry()) && $this->lastEntry()->isOpened();
    }

    public function isMale() : bool
    {
        return $this->details()->gender() == Details::GENDER_MALE;
    }

    public function email() : EmailAddress
    {
        return $this->email;
    }

    public function details() : Details
    {
        return $this->details;
    }

    public function vouchers() : Collection
    {
        return $this->vouchers;
    }

    public function lastEntry() : ?Entry
    {
        return $this->lastEntry;
    }

    public function entries() : Collection
    {
        return $this->entries;
    }

    public function sections() : Collection
    {
        return $this->sections;
    }

    public function removeEntry(Entry $entry)
    {
        if(!is_null($this->lastEntry()) && $this->lastEntry()->id() === $entry->id()) {
            $this->lastEntry = null;
        }

        $this->entries->removeElement($entry);
    }

    /**
     * @param EmailAddress $email
     * @param Details $details
     * @param $sections
     * @param $vouchers
     * @param $entries
     * @param Voucher $currentVoucher
     * @param Entry $lastEntry
     */
    public function __construct(EmailAddress $email, Details $details, $sections = [], $vouchers = [], $entries = [], $currentVoucher = null, $lastEntry = null)
    {
        $this->email = $email;
        $this->details = $details;
        $this->sections = $sections;
        $this->vouchers = $vouchers;
        $this->entries = $entries;
        $this->currentVoucher = $currentVoucher;
        $this->lastEntry = $lastEntry;
    }

    public function id() : UuidInterface
    {
        return $this->id;
    }

    /**
     * @param Voucher $newVoucher
     * @throws VouchersAreOverlappingException
     */
    public function addVoucher(Voucher $newVoucher)
    {
        if (!$this->vouchers()->isEmpty()) {
            foreach ($this->vouchers() as $voucher) {
                if (
                    !$voucher->isClosed()
                    && $voucher->overlaps($newVoucher)
                    && $voucher->leftEntriesAmount() > 0
                ) {
                    throw new VouchersAreOverlappingException($this, $voucher, $newVoucher);
                }
            }
        }

        $this->vouchers->add($newVoucher);
        $this->updateCurrentVoucher();

        $newVoucher->setMember($this);
    }

    public function currentVoucher() : ?Voucher
    {
        return $this->currentVoucher;
    }

    public function hasCurrentVoucher() : bool
    {
        $currentVoucher = $this->currentVoucher();

        return !is_null($currentVoucher);
    }

    /**
     * @throws Exception
     * @throws MemberHasNoLastEntryException
     * @throws NoCurrentVoucherForVoucherEntryException
     * @throws \Exception
     * @throws \Gyman\Application\Exception\UnsupportedEntryTypeException
     */
    public function enter(Entry $entry)
    {
        if(is_null($entry->occurrence())) {
            throw new Exception("Entry must be on purpose, you have to choose activity occurrence to enter to. (\$occurrence is null)");
        }

        if ($this->hasLastEntry() && $this->lastEntry()->isOpened()) {
            $this->exitLastEntry();
        }

        if (!$this->hasCurrentVoucher() && $entry->isType(Entry::TYPE_VOUCHER)) {
            throw new NoCurrentVoucherForVoucherEntryException(
                sprintf(
                    "Cant add 'voucher' entry#%s where there is no current voucher for member %s",
                    $entry->id(),
                    $this->email()
                )
            );
        }

        if($this->checkIfAlreadyEntered($entry->occurrence()))
        {
            throw new \Exception(
                sprintf(
                    "Member %s %s (id: %s) already joined this class (occurrence id: %s date: %s, event name: %s)! Can't do it again!",
                    $this->details()->firstname(),
                    $this->details()->lastname(),
                    $this->id(),
                    $entry->occurrence()->id(),
                    $entry->occurrence()->startDate()->format("Y-m-d H:i:s"),
                    $entry->occurrence()->event()->title()
                )
            );
        }

        $this->lastEntry = $entry;
        $this->entries->add($entry);

        if ($this->hasCurrentVoucher() && $entry->isType(Entry::TYPE_VOUCHER)) {
            $this->currentVoucher->addEntry($entry);
        }

        $entry->assignToMember($this);
    }

    /**
     * @throws \Gyman\Application\Exception\EntryClosingDateBeforeOpeningException
     */
    public function exitLastEntry()
    {
        if ($this->hasLastEntry() && $this->lastEntry()->isOpened()) {
            $this->lastEntry()->closeEntry(new \DateTime("now"));
        }

        $this->lastEntry = null;
    }

    public function hasLastEntry() : bool
    {
        return $this->lastEntry !== null;
    }

    /**
     * Searches for voucher that is current for actual time and sets it to currentVoucher param
     */
    public function updateCurrentVoucher()
    {
        $now = Carbon::parse("now");

        if ($this->hasCurrentVoucher()) {
            $currentVoucher = $this->currentVoucher();
            $startDate = Carbon::instance($currentVoucher->startDate());
            $endDate = Carbon::instance($currentVoucher->endDate());
            if (
                $now->between($startDate, $endDate, true)
                && ($currentVoucher->leftEntriesAmount() > 0 || $currentVoucher->isUnlimited())
                && !$currentVoucher->isClosed()
            ) {
                return;
            }
        }

        if ($this->vouchers()->count() > 0) {
            foreach ($this->vouchers() as $voucher) {
                $startDate = Carbon::instance($voucher->startDate());
                $endDate = Carbon::instance($voucher->endDate());
                if ($now->between($startDate, $endDate)
                    && ($voucher->leftEntriesAmount() > 0 || $voucher->isUnlimited())
                    && !$voucher->isClosed()
                ) {
                    $this->currentVoucher = $voucher;
                    return;
                }
            }
        }

        $this->currentVoucher = null;
    }

    public function updateDetails(Details $details)
    {
        $this->details = $details;
    }

    public function updateEmail(EmailAddress $email)
    {
        $this->email = $email;
    }

    public function unsetCurrentVoucher()
    {
        $this->currentVoucher = null;
    }

    /**
     * @param Section[]|ArrayCollection $sections
     */
    public function setSections($sections)
    {
        $this->sections = $sections;
    }

    /**
     * @param Occurrence|null $occurrence
     * @return bool
     */
    public function checkIfAlreadyEntered(Occurrence $occurrence = null)
    {
        if(is_null($occurrence))
        {
            return false;
        }

        $filtered = $this->entries()->filter(function(Entry $entry) use ($occurrence) {

            if(is_null($entry->occurrence())) // null occurrence can happen if user entered to activity that has deleted occurence from calendar
            {
                return false;
            }

            $entryOccurrenceId = $entry->occurrence()->id();
            return $entryOccurrenceId === $occurrence->id();
        });

        return $filtered->count() > 0 && $filtered->current()->occurrence()->id() === $occurrence->id();
    }

    /**
     * @return \Doctrine\Common\Collections\Collection|static
     */
    public function filterCreditEntries()
    {
        return $this->entries->filter(function(Entry $entry){
            return $entry->isType(Entry::TYPE_CREDIT);
        });
    }

    /**
     * @param Voucher $voucher
     */
    public function setCurrentVoucher(Voucher $voucher)
    {
        $this->currentVoucher = $voucher;
    }

    public function password() : string
    {
        return $this->password;
    }

    public function salt()
    {
        return $this->salt;
    }
}
