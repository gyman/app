<?php

declare(strict_types=1);

namespace Gyman\Domain\Entry;

use Gyman\Application\Exception\UnsupportedEntryTypeException;

class Type
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
    /** @var string */
    private $type;

    /**
     * Type constructor.
     *
     * @param string $type
     *
     * @throws UnsupportedEntryTypeException
     */
    public function __construct(string $type)
    {
        if (!in_array($type, self::$availableTypes, true)) {
            throw new UnsupportedEntryTypeException(
                sprintf('Unsupported entry type: %s', $type)
            );
        }

        $this->type = $type;
    }

    public function __toString(): string
    {
        return $this->type;
    }

    public function equals(self $type): bool
    {
        return $this->type === $type->type;
    }

    public static function free(): self
    {
        return new self(self::TYPE_FREE);
    }

    public static function voucher(): self
    {
        return new self(self::TYPE_VOUCHER);
    }

    public static function paid(): self
    {
        return new self(self::TYPE_PAID);
    }

    public static function credit(): self
    {
        return new self(self::TYPE_CREDIT);
    }
}
