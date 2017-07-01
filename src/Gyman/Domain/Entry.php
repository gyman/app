<?php
namespace Gyman\Domain;

use Carbon\Carbon;
use DateTime;
use Gyman\Domain\Calendar\Event\Occurrence;
use Exception;
use Gyman\Application\Exception\EntryClosingDateBeforeOpeningException;
use Gyman\Application\Exception\EntryMustBeVoucherTypeException;
use Gyman\Application\Exception\NotSupportedEntryType;
use Gyman\Application\Exception\UnsupportedEntryTypeException;
use Gyman\Domain\Entry\Price;

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
     * @var DateTime $created
     */
    protected $createdAt;

    /**
     * @var DateTime $modified
     */
    protected $updatedAt;

    /**
     * @var Datetime $deletedAt
     */
    protected $deletedAt;

    /**
     * Entry constructor.
     * @param \DateTime $startDate
     * @param string $type
     * @param \DateTime $endDate |null
     * @param Price $price |null
     * @param Occurrence $occurrence
     * @param Member $member
     * @throws NotSupportedEntryType
     */
    public function __construct(\DateTime $startDate, $type, $endDate = null, Price $price, Occurrence $occurrence = null, Member $member = null)
    {
        if (!in_array($type, self::$availableTypes)) {
            throw new NotSupportedEntryType($type, self::$availableTypes);
        }

        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->price = $price;
        $this->type = $type;
        $this->occurrence = $occurrence;
        $this->member = $member;
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
        if (Carbon::instance($date)->lt(Carbon::instance($this->startDate()))) {
            throw new EntryClosingDateBeforeOpeningException();
        }

        $this->endDate = $date;
    }

    /**
     * @return bool
     */
    public function isOpened()
    {
        return is_null($this->endDate);
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
        if(!$this->isType(self::TYPE_CREDIT))
        {
            return new Exception(sprintf(
                "You can only pay off credit entry, %s is not allowed",
                $this->type()
            ));
        }

        $this->type = self::TYPE_VOUCHER;
        $voucher->addEntry($this);
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
