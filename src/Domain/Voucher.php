<?php
namespace Gyman\Domain;

use Carbon\Carbon;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Exception;
use Gyman\Application\Command\UpdateVoucherCommand;
use Gyman\Application\Exception\EntryMustBeVoucherTypeException;
use Gyman\Application\Exception\ExceededMaximumAmountOfEntriesException;
use Gyman\Application\Exception\UnsupportedEntryTypeException;
use Gyman\Application\Exception\VoucherClosingDateBeforeOpeningException;
use Gyman\Domain\Voucher\Price;
use function is_array;
use Ramsey\Uuid\UuidInterface;

class Voucher
{
    /**
     * @var DateTime
     */
    protected $startDate;

    /**
     * @var DateTime
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
     * @var UuidInterface
     */
    protected $id;

    /**
     * @var Member
     */
    protected $member;

    /**
     * @var Collection|Entry[]
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
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @param Price $price
     * @param int $maximumAmount
     * @param array $entries
     * @param null $member
     * @param DateTime $closedAt
     * @throws VoucherClosingDateBeforeOpeningException
     */
    public function __construct(DateTime $startDate, ?DateTime $endDate, ?Price $price, int $maximumAmount = 0, ?Collection $entries, Member $member = null, ?DateTime $closedAt)
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

        $this->createdAt = new DateTime("now");
    }

    /**
     * @throws EntryMustBeVoucherTypeException
     * @throws ExceededMaximumAmountOfEntriesException
     * @throws Exception
     * @throws UnsupportedEntryTypeException
     */
    public function addEntry(Entry $entry) : void
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

        $this->entries()->add($entry);
        $entry->assignToVoucher($this);
    }

    public function lastEntry() : ?Entry
    {
        if ($this->entries()->count() === 0) {
            return null;
        }

        return $this->entries()->last();
    }

    public function close(DateTime $date = null) : void
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

    public function startDate() : DateTime
    {
        return $this->startDate;
    }

    public function endDate() : ?DateTime
    {
        return $this->endDate;
    }

    public function maximumAmount() : ?int
    {
        return $this->maximumAmount;
    }

    public function price() : Price
    {
        return $this->price;
    }

    /**
     * @return ArrayCollection|Entry[]
     */
    public function entries() : ?Collection
    {
        return $this->entries;
    }

    public function leftEntriesAmount() : ?int
    {
        if ($this->isUnlimited()) {
            return null;
        }

        return $this->maximumAmount() - $this->entries()->count();
    }

    public function usedEntriesAmount() : int
    {
        return $this->entries()->count();
    }

    public function leftDaysAmount($relatedTo = 'now') : int
    {
        $diffToDate = new DateTime($relatedTo);

        if($diffToDate > $this->endDate) {
            return 0;
        }

        return $this->endDate->diff($diffToDate)->days;

    }

    public function totalDaysAmount() : int
    {
        return $this->endDate()->diff($this->startDate())->days;
    }

    public function passedDaysAmount($relatedTo = 'now') : int
    {
        return $this->totalDaysAmount() - $this->leftDaysAmount($relatedTo);
    }

    public function isUnlimited() : bool
    {
        return $this->maximumAmount === null;
    }

    public function overlaps(Voucher $voucher) : bool
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

    public function member() : Member
    {
        return $this->member;
    }

    public function setMember(Member $member) : void
    {
        $this->member = $member;
    }

    public function id() : UuidInterface
    {
        return $this->id;
    }

    public function removeEntry(Entry $entry) : void
    {
        $this->entries()->removeElement($entry);
    }

    public function createdAt() : DateTime
    {
        return $this->createdAt;
    }

    public function isClosed() : bool
    {
        return !is_null($this->closedAt());
    }

    public function closedAt() : ?DateTime
    {
        return $this->closedAt;
    }

    public function isCurrent() : bool
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

    public function updateWithCommand(UpdateVoucherCommand $updateVoucherCommand) : void
    {
        $this->startDate = $updateVoucherCommand->startDate;
        $this->endDate = $updateVoucherCommand->endDate;

        $this->price = new Price($updateVoucherCommand->price, $this->price()->currency());
        $this->maximumAmount = $updateVoucherCommand->maximumAmount;

        $this->updatedAt = new DateTime();
    }
}
