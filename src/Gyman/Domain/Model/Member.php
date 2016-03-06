<?php
namespace Gyman\Domain\Model;

use Dende\Calendar\Domain\Calendar\Event\Occurrence;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Exception\LastEntryIsStillOpenedException;
use Gyman\Domain\Exception\MemberHasNoLastEntryException;
use Gyman\Domain\Exception\NoCurrentVoucherForVoucherEntryException;
use Gyman\Domain\Exception\VouchersAreOverlappingException;
use Mockery\CountValidator\Exception;

/**
 * Class Member
 * @package Gyman\Domain
 */
class Member
{
    /**
     * @var string
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

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return EmailAddress
     */
    public function email()
    {
        return $this->email;
    }

    /**
     * @return Details
     */
    public function details()
    {
        return $this->details;
    }

    /**
     * @return ArrayCollection|Section[]
     */
    public function sections()
    {
        return $this->sections;
    }

    /**
     * @return ArrayCollection|Voucher[]
     */
    public function vouchers()
    {
        return $this->vouchers;
    }

    /**
     * @return ArrayCollection|Entry[]
     */
    public function entries()
    {
        return $this->entries;
    }

    /**
     * @return Entry|null
     */
    public function lastEntry()
    {
        return $this->lastEntry;
    }

    /**
     * @param $newVoucher
     */
    public function addVoucher(Voucher $newVoucher)
    {
        if (!$this->vouchers instanceof ArrayCollection) {
            $this->vouchers = new ArrayCollection();
        }

        if (!$this->vouchers()->isEmpty()) {
            foreach ($this->vouchers() as $existingVoucher) {
                if ($existingVoucher->overlaps($newVoucher)) {
                    throw new VouchersAreOverlappingException($this, $existingVoucher, $newVoucher);
                }
            }
        }

        $this->vouchers->add($newVoucher);
        $this->updateCurrentVoucher();

        $newVoucher->setMember($this);
    }

    /**
     * @return Voucher
     */
    public function currentVoucher()
    {
        return $this->currentVoucher;
    }

    /**
     * @return bool
     */
    public function hasCurrentVoucher()
    {
        return !is_null($this->currentVoucher());
    }

    /**
     * @param Entry $entry
     * @param Occurrence $occurrence
     * @throws LastEntryIsStillOpenedException
     * @throws NoCurrentVoucherForVoucherEntryException
     * @throws \Exception
     * @throws \Gyman\Domain\Exception\EntryMustBeVoucherTypeException
     * @throws \Gyman\Domain\Exception\ExceededMaximumAmountOfEntriesException
     * @throws \Gyman\Domain\Exception\UnsupportedEntryTypeException
     */
    public function enter(Entry $entry)
    {
        if(is_null($entry->occurrence())) {
            throw new Exception("Entry must be on purpose, you have to choose activity occurrence to enter to. (\$occurrence is null)");
        }

        if ($this->hasLastEntry() && $this->lastEntry()->isOpened()) {
            $this->exitLastEntry();
//            throw new LastEntryIsStillOpenedException($entry, $this->lastEntry());
        }

        if (!$this->hasCurrentVoucher() && $entry->isType(Entry::TYPE_VOUCHER)) {
            throw new NoCurrentVoucherForVoucherEntryException("Cant add 'voucher' entry where there is no current voucher for member");
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

//        if($entry->occurrence()->isPast()) {
//            throw new \Exception(sprintf(
//                    "Can't enter on occurence that already finished in %s!\nMember Id: %s, Occurrence Id: %d",
//                    $entry->occurrence()->endDate()->format("Y-m-d H:i:s"),
//                    $this->id(),
//                    $entry->occurrence()->id()
//            ));
//        }

        $this->lastEntry = $entry;
        $this->entries->add($entry);

        if ($this->hasCurrentVoucher() && $entry->isType(Entry::TYPE_VOUCHER)) {
            $this->currentVoucher->addEntry($entry);
        }

        $entry->assignToMember($this);
    }

    public function exitLastEntry()
    {
        if (!$this->hasLastEntry() || !$this->lastEntry()->isOpened()) {
            throw new MemberHasNoLastEntryException();
        }

        $this->lastEntry()->closeEntry(new \DateTime());
        $this->lastEntry = null;
    }

    /**
     * @return bool
     */
    public function hasLastEntry()
    {
        return $this->lastEntry !== null;
    }

    /**
     * Searches for voucher that is current for actual time and sets it to currentVoucher param
     */
    public function updateCurrentVoucher()
    {
        $now = time();

        if ($this->hasCurrentVoucher()) {
            $currentStart = $this->currentVoucher->startDate()->getTimestamp();
            $currentEnd = $this->currentVoucher->endDate()->getTimestamp();

            if ($currentStart <= $now && $now <= $currentEnd) {
                return;
            }
        }

        if ($this->vouchers()->count() > 0) {
            foreach ($this->vouchers() as $voucher) {
                $start = $voucher->startDate()->getTimestamp();
                $end = $voucher->endDate()->getTimestamp();
                if ($start <= $now && $now <= $end) {
                    $this->currentVoucher = $voucher;

                    return;
                }
            }
        }
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
}
