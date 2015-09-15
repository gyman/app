<?php
namespace Gyman\Domain\Model;

use Gyman\Domain\Exception\EntryClosingDateBeforeOpeningException;
use Gyman\Domain\Exception\EntryMustBeVoucherTypeException;
use Gyman\Domain\Exception\NotSupportedEntryType;
use Gyman\Domain\Exception\UnsupportedEntryTypeException;

/**
 * Class Entry
 * @package Gyman\Domain
 */
class Entry
{
    const TYPE_FREE = 'free';
    const TYPE_VOUCHER = 'voucher';
    const TYPE_PAID = 'paid';
    const TYPE_MULTISPORT = 'multisport';

    public static $availableTypes = [
        self::TYPE_FREE,
        self::TYPE_VOUCHER,
        self::TYPE_PAID,
        self::TYPE_MULTISPORT,
    ];

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var \DateTime
     */
    protected $endDate;

    /**
     * @var Price $price
     */
    protected $price;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var Voucher
     */
    protected $voucher;

    /**
     * Entry constructor.
     * @param \DateTime $startDate
     * @param string $type
     * @param \DateTime $endDate|null
     * @param Price $price|null
     */
    public function __construct(\DateTime $startDate, $type, $endDate = null, $price = null)
    {
        if (!in_array($type, self::$availableTypes)) {
            throw new NotSupportedEntryType();
        }

        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->price = $price;
        $this->type = $type;
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
     * @return Price
     */
    public function price()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @param \DateTime $date
     * @throws EntryClosingDateBeforeOpeningException
     */
    public function closeEntry(\DateTime $date)
    {
        if ($this->startDate()->getTimestamp() > $date->getTimestamp()) {
            throw new EntryClosingDateBeforeOpeningException();
        }

        $this->endDate = $date;
    }

    /**
     * @return bool
     */
    public function isOpened()
    {
        if (!is_null($this->startDate) && is_null($this->endDate)) {
            return true;
        }

        return false;
    }

    /**
     * @param $type
     * @throws UnsupportedEntryTypeException
     * @return bool
     */
    public function isType($type)
    {
        if (!in_array($type, self::$availableTypes)) {
            throw new UnsupportedEntryTypeException(
                sprintf('Unsupported entry type: %s', $type)
            );
        }

        return $this->type() === $type;
    }

    /**
     * @param Voucher $voucher
     */
    public function assignToVoucher(Voucher $voucher)
    {
        if (!$this->isType(self::TYPE_VOUCHER)) {
            throw new EntryMustBeVoucherTypeException();
        }

        $this->voucher = $voucher;
    }

    /**
     * @return Voucher
     */
    public function voucher()
    {
        return $this->voucher;
    }
}
