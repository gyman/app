<?php
namespace Gyman\Domain\Model;

use Dende\Calendar\Domain\Calendar\Event\Occurrence;
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
    const TYPE_CREDIT = 'credit';

    public static $availableTypes = [
        self::TYPE_FREE,
        self::TYPE_VOUCHER,
        self::TYPE_PAID,
        self::TYPE_CREDIT,
    ];

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var Member
     */
    protected $member;

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
     * @var Occurrence
     */
    protected $occurrence;

    /**
     * Entry constructor.
     * @param \DateTime $startDate
     * @param string $type
     * @param \DateTime $endDate |null
     * @param Price $price |null
     * @throws NotSupportedEntryType
     */
    public function __construct(\DateTime $startDate, $type, $endDate = null, Price $price, Occurrence $occurrence = null)
    {
        if (!in_array($type, self::$availableTypes)) {
            throw new NotSupportedEntryType();
        }

        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->price = $price;
        $this->type = $type;
        $this->occurrence = $occurrence;
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
            throw new EntryMustBeVoucherTypeException("If you want to add entry to voucher it must be a 'voucher' type entry");
        }

        $this->voucher = $voucher;
    }

    /**
     * @param Voucher $voucher
     */
    public function payOffWithVoucher(Voucher $voucher)
    {
        $this->type = self::TYPE_VOUCHER;
        $this->assignToVoucher($voucher);
    }

    /**
     * @return Voucher
     */
    public function voucher()
    {
        return $this->voucher;
    }

    /**
     * @return Member
     */
    public function member()
    {
        return $this->member;
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param Member $member
     */
    public function assignToMember(Member $member)
    {
        $this->member = $member;
    }

    /**
     * @return Occurrence
     */
    public function occurrence()
    {
        return $this->occurrence;
    }
}
