<?php
namespace Gyman\Domain;

use Carbon\Carbon;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;
use Gyman\Application\Command\UpdateVoucherCommand;
use Gyman\Application\Exception\EntryMustBeVoucherTypeException;
use Gyman\Application\Exception\ExceededMaximumAmountOfEntriesException;
use Gyman\Application\Exception\LastEntryIsStillOpenedException;
use Gyman\Application\Exception\UnsupportedEntryTypeException;
use Gyman\Application\Exception\VoucherClosingDateBeforeOpeningException;
use Gyman\Domain\Voucher\Price;

/**
 * Class Voucher
 * @package Gyman\Domain
 */
class Voucher
{
    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var \DateTime
     */
    protected $endDate;

    /**
     * @var integer
     */
    protected $maximumAmount;

    /**
     * @var Price
     */
    protected $price;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var Member
     */
    protected $member;

    /**
     * @var Entry[]
     */
    protected $entries;

    /**
     * @var DateTime $created
     */
    protected $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    protected $updatedAt;

    /**
     * @var Datetime $deletedAt
     */
    protected $deletedAt;

    /**
     * @var Datetime $deletedAt
     */
    protected $closedAt;

    /**
     * Voucher constructor.
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param Price $price
     * @param int $maximumAmount
     * @param array $entries
     * @param null $member
     * @param DateTime $closedAt
     * @throws VoucherClosingDateBeforeOpeningException
     */
    public function __construct(\DateTime $startDate, \DateTime $endDate, Price $price, $maximumAmount = 0, $entries = [], $member = null, DateTime $closedAt = null)
    {
        if ($startDate->getTimestamp() >= $endDate->getTimestamp()) {
            throw new VoucherClosingDateBeforeOpeningException($startDate, $endDate);
        }

        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->price = $price;
        $this->maximumAmount = $maximumAmount;
        $this->member = $member;

        if (!$entries instanceof ArrayCollection && is_array($entries)) {
            $entries = new ArrayCollection($entries);
        }

        $this->entries = $entries;
        $this->closedAt = $closedAt;
    }

    /**
     * @param Entry $entry
     * @throws EntryMustBeVoucherTypeException
     * @throws ExceededMaximumAmountOfEntriesException
     * @throws Exception
     * @throws UnsupportedEntryTypeException
     */
    public function addEntry(Entry $entry)
    {
        if($this->isClosed()) {
            throw new Exception("Can't add entry to closed voucher!");
        }

        if (!$entry->isType(Entry::TYPE_VOUCHER)) {
            throw new EntryMustBeVoucherTypeException();
        }

        if (!$this->isUnlimited() && $this->leftEntriesAmount() === 0) {
            throw new ExceededMaximumAmountOfEntriesException();
        }

        $this->entries->add($entry);
        $entry->assignToVoucher($this);
    }

    /**
     * @return Entry|null
     */
    public function lastEntry()
    {
        if ($this->entries->count() > 0) {
            return $this->entries->last();
        }
    }

    /**
     * @param DateTime $date
     * @throws VoucherClosingDateBeforeOpeningException
     */
    public function close(DateTime $date = null)
    {
        /** @var Entry $lastEntry */
        $lastEntry = $this->lastEntry();

        if(!is_null($lastEntry) && $lastEntry->isOpened()) {
            $lastEntry->closeEntry(new DateTime("now"));
        }

        if($this->isCurrent()) {
            $this->member()->unsetCurrentVoucher();
        }

        $this->closedAt = is_null($date) ? new DateTime("now") : $date;
    }

    /**
     * @return \DateTime
     */
    public function startDate()
    {
        return $this->startDate;
    }

    /**
     * @return \DateTime
     */
    public function endDate()
    {
        return $this->endDate;
    }

    /**
     * @return int
     */
    public function maximumAmount()
    {
        return $this->maximumAmount;
    }

    /**
     * @return Price
     */
    public function price()
    {
        return $this->price;
    }

    /**
     * @return ArrayCollection|Entry[]
     */
    public function entries()
    {
        return $this->entries;
    }

    /**
     * @return int|null
     */
    public function leftEntriesAmount()
    {
        if ($this->isUnlimited()) {
            return;
        }

        return $this->maximumAmount() - $this->entries()->count();
    }

    /**
     * @return int
     */
    public function usedEntriesAmount()
    {
        return $this->entries()->count();
    }

    /**
     * @param string $relatedTo
     * @return int
     */
    public function leftDaysAmount($relatedTo = 'now')
    {
        $diffToDate = new DateTime($relatedTo);

        if($diffToDate > $this->endDate) {
            return 0;
        }

        return $this->endDate->diff($diffToDate)->days;

    }

    /**
     * @return int
     */
    public function totalDaysAmount()
    {
        return $this->endDate()->diff($this->startDate())->days;
    }

    /**
     * @param string $relatedTo
     * @return int
     */
    public function passedDaysAmount($relatedTo = 'now')
    {
        return $this->totalDaysAmount() - $this->leftDaysAmount($relatedTo);
    }

    /***
     * @return bool
     */
    public function isUnlimited()
    {
        return $this->maximumAmount === null;
    }

    /**
     * @param Voucher $voucher
     * @return bool
     */
    public function overlaps(Voucher $voucher)
    {
        if($voucher->isClosed() || $this->isClosed()) {
            return false;
        }

        if($voucher->leftEntriesAmount() === 0 || $this->leftEntriesAmount() === 0)
        {
            return false;
        }

        $start = Carbon::instance($voucher->startDate());
        $end = Carbon::instance($voucher->endDate());

        $comparisionStart = Carbon::instance($this->startDate());
        $comparisionEnd = Carbon::instance($this->endDate());

        if ($end < $comparisionStart || $start > $comparisionEnd) {
            return false;
        }

        return true;
    }

    /**
     * @return Member
     */
    public function member()
    {
        return $this->member;
    }

    public function setMember(Member $member)
    {
        $this->member = $member;
    }

    public function id()
    {
        return $this->id;
    }

    public function removeEntry(Entry $entry)
    {
//        if(!is_null($this->lastEntry()) && $this->lastEntry()->id() === $entry->id()) {
//            $this->lastEntry = null;
//        }

        $this->entries->removeElement($entry);
    }

    /**
     * @return DateTime
     */
    public function createdAt()
    {
        return $this->createdAt;
    }

    /**
     * @return bool
     */
    public function isClosed()
    {
        return !is_null($this->closedAt());
    }

    /**
     * @return DateTime
     */
    public function closedAt()
    {
        return $this->closedAt;
    }

    /**
     * @return bool
     */
    public function isCurrent()
    {
        if(is_null($this->member()->currentVoucher())) {
            return false;
        }

        $currentVoucher = $this->member()->currentVoucher();

        if($currentVoucher->leftDaysAmount() === 0 || $currentVoucher->leftEntriesAmount() === 0) {
            return false;
        }

        return $currentVoucher === $this;
    }

    /**
     * @param UpdateVoucherCommand $updateVoucherCommand
     */
    public function updateWithCommand(UpdateVoucherCommand $updateVoucherCommand)
    {
        $this->startDate = $updateVoucherCommand->startDate;
        $this->endDate = $updateVoucherCommand->endDate;

        $this->price = new Price($updateVoucherCommand->price, $this->price()->currency());
        $this->maximumAmount = $updateVoucherCommand->maximumAmount;

        $this->updatedAt = new DateTime();
    }
}
