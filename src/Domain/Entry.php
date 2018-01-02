<?php

declare(strict_types=1);

namespace Gyman\Domain;

use Carbon\Carbon;
use DateTime;
use Exception;
use Gyman\Application\Exception\EntryClosingDateBeforeOpeningException;
use Gyman\Application\Exception\EntryMustBeVoucherTypeException;
use Gyman\Application\Exception\NotSupportedEntryType;
use Gyman\Application\Exception\UnsupportedEntryTypeException;
use Gyman\Domain\Calendar\Event\Occurrence;
use Gyman\Domain\Entry\Price;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Entry.
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
     * @var UuidInterface
     */
    protected $id;

    /**
     * @var Member
     */
    protected $member;

    /**
     * @var DateTime
     */
    protected $startDate;

    /**
     * @var DateTime
     */
    protected $endDate;

    /**
     * @var Price
     */
    protected $price;

    /**
     * @todo change into Entry/Type value object
     *
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
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var DateTime
     */
    protected $updatedAt;

    /**
     * @var Datetime
     */
    protected $deletedAt;

    /**
     * Entry constructor.
     *
     * @param DateTime   $startDate
     * @param string     $type
     * @param DateTime   $endDate    |null
     * @param Price      $price      |null
     * @param Occurrence $occurrence
     * @param Member     $member
     *
     * @throws NotSupportedEntryType
     */
    public function __construct(DateTime $startDate, $type, $endDate, Price $price, Occurrence $occurrence = null, Member $member = null)
    {
        if (!in_array($type, self::$availableTypes, true)) {
            throw new NotSupportedEntryType($type, self::$availableTypes);
        }

        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->price = $price;
        $this->type = $type;
        $this->occurrence = $occurrence;
        $this->member = $member;

        $this->createdAt = new DateTime('now');
        $this->updatedAt = new DateTime('now');
    }

    public function startDate(): DateTime
    {
        return $this->startDate;
    }

    public function endDate(): ?DateTime
    {
        return $this->endDate;
    }

    public function price(): ?Price
    {
        return $this->price;
    }

    public function type(): string
    {
        return $this->type;
    }

    /**
     * @throws EntryClosingDateBeforeOpeningException
     */
    public function closeEntry(DateTime $date): void
    {
        if (Carbon::instance($date)->lt(Carbon::instance($this->startDate()))) {
            throw new EntryClosingDateBeforeOpeningException();
        }

        $this->endDate = $date;
    }

    public function isOpened(): bool
    {
        return null === $this->endDate;
    }

    /**
     * @param mixed $type
     *
     * @throws UnsupportedEntryTypeException
     */
    public function isType($type): bool
    {
        if (!in_array($type, self::$availableTypes, true)) {
            // todo: remove, should throw false if not supported string
            throw new UnsupportedEntryTypeException(
                sprintf('Unsupported entry type: %s', $type)
            );
        }

        return $this->type() === $type;
    }

    public function assignToVoucher(Voucher $voucher): void
    {
        if (!$this->isType(self::TYPE_VOUCHER)) {
            throw new EntryMustBeVoucherTypeException("If you want to add entry to voucher it must be a 'voucher' type entry");
        }

        $this->voucher = $voucher;
    }

    public function payOffWithVoucher(Voucher $voucher): void
    {
        if (!$this->isType(self::TYPE_CREDIT)) {
            throw new Exception(sprintf(
                'You can only pay off credit entry, %s is not allowed',
                $this->type()
            ));
        }

        $this->type = self::TYPE_VOUCHER;
        $voucher->addEntry($this);
        $this->assignToVoucher($voucher);
    }

    public function voucher(): ?Voucher
    {
        return $this->voucher;
    }

    public function member(): Member
    {
        return $this->member;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function assignToMember(Member $member): void
    {
        $this->member = $member;
    }

    public function occurrence(): ?Occurrence
    {
        return $this->occurrence;
    }
}
