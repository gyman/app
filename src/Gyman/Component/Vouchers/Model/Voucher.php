<?php
namespace Gyman\Component\Vouchers\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Component\Vouchers\Exception\EntryMustBeVoucherTypeException;
use Gyman\Component\Vouchers\Exception\ExceededMaximumAmountOfEntriesException;
use Gyman\Component\Vouchers\Exception\LastEntryIsStillOpenedException;
use Gyman\Component\Vouchers\Exception\VoucherClosingDateBeforeOpeningException;

/**
 * Class Voucher
 * @package Gyman\Component\Vouchers
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
     * @var Entry[]
     */
    protected $entries;

    /**
     * Voucher constructor.
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param Price $price
     * @param int $maximumAmount
     */
    public function __construct(\DateTime $startDate, \DateTime $endDate, Price $price, $maximumAmount = 0, $entries = [])
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->price = $price;
        $this->maximumAmount = $maximumAmount;

        if (!$entries instanceof ArrayCollection) {
            $entries = new ArrayCollection($entries);
        }

        $this->entries = $entries;
    }

    /**
     * @param Entry $entry
     * @throws ExceededMaximumAmountOfEntriesException
     */
    public function addEntry(Entry $entry)
    {
        if (!$entry->isType(Entry::TYPE_VOUCHER)) {
            throw new EntryMustBeVoucherTypeException();
        }

        if (!$this->isUnlimited() && $this->getFreeAmount() === 0) {
            throw new ExceededMaximumAmountOfEntriesException();
        }

        /** @var Entry $lastEntry */
        $lastEntry = $this->lastEntry();

        if ($lastEntry && $lastEntry->isOpened()) {
            throw new LastEntryIsStillOpenedException();
        }

        $this->entries->add($entry);
        $entry->assignToVoucher($this);
    }

    /**
     * @return Entry|null
     */
    public function lastEntry()
    {
        return $this->entries->last();
    }

    /**
     * @param \DateTime $date
     * @throws VoucherClosingDateBeforeOpeningException
     */
    public function close(\DateTime $date)
    {
        if ($this->startDate()->getTimestamp() > $date->getTimestamp()) {
            throw new VoucherClosingDateBeforeOpeningException();
        }

        $this->endDate = $date;
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
    public function getFreeAmount()
    {
        if ($this->isUnlimited()) {
            return;
        }

        return $this->maximumAmount() - $this->entries()->count();
    }

    /***
     * @return bool
     */
    private function isUnlimited()
    {
        return $this->maximumAmount === null;
    }
}