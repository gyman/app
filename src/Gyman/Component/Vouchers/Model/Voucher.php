<?php

namespace Gyman\Component\Vouchers\Model;

use Gyman\Component\Vouchers\Exception\ExceededMaximumAmountOfEntriesException;

/**
 * Class Voucher
 * @package Gyman\Component\Vouchers
 */
class Voucher
{
    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var integer
     */
    private $maximumAmount;

    /**
     * @var Price
     */
    private $price;

    /**
     * @var Entry[]
     */
    private $entries;

    /**
     * Voucher constructor.
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param Price $price
     * @param int $maximumAmount
     */
    public function __construct(\DateTime $startDate, \DateTime $endDate, Price $price, $maximumAmount = 0)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->price = $price;
        $this->maximumAmount = $maximumAmount;
    }

    /**
     * @param Entry $entry
     * @throws ExceededMaximumAmountOfEntriesException
     */
    public function addEntry(Entry $entry)
    {
        if ($this->maximumAmount > 0 && count($this->entries) < $this->maximumAmount) {
            $this->entries[] = $entry;
        } else {
            throw new ExceededMaximumAmountOfEntriesException();
        }
    }
}
