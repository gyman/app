<?php

namespace Gyman\Domain\Entry\Command;

use Gyman\Domain\Calendar\Event\Occurrence;
use Gyman\Domain\Entry;
use Gyman\Domain\Entry\Price;
use Gyman\Domain\Member\Details\Barcode;

class QuickOpenEntry
{
    /**
     * @var Barcode
     */
    private $barcode;

    /**
     * @var string
     */
    private $entryType;

    /**
     * @var Price
     */
    private $price;

    /**
     * @var Occurrence
     */
    private $occurrence;

    public function __construct(?Barcode $barcode = null, ?string $entryType = null, ?Price $price = null, ?Occurrence $occurrence = null)
    {
        $this->barcode = $barcode ?? new Barcode('');
        $this->entryType = $entryType ?? Entry::TYPE_VOUCHER;
        $this->price = $price ?? Price::zero();
        $this->occurrence = $occurrence;
    }

    public function barcode(): Barcode
    {
        return $this->barcode;
    }

    public function entryType(): string
    {
        return $this->entryType;
    }

    public function price(): Price
    {
        return $this->price;
    }

    public function occurrence(): ?Occurrence
    {
        return $this->occurrence;
    }

    public function setBarcode(Barcode $barcode): void
    {
        $this->barcode = $barcode;
    }

    public function setEntryType(string $entryType): void
    {
        $this->entryType = $entryType;
    }

    public function setPrice(Price $price): void
    {
        $this->price = $price;
    }

    public function setOccurrence(Occurrence $occurrence): void
    {
        $this->occurrence = $occurrence;
    }
}