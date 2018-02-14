<?php

namespace Gyman\Domain\Entry\Command;

use Gyman\Domain\Calendar\Event\Occurrence;
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

    public function __construct(Barcode $barcode, string $entryType, Price $price, Occurrence $occurrence)
    {
        $this->barcode = $barcode;
        $this->entryType = $entryType;
        $this->price = $price;
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

    public function occurrence(): Occurrence
    {
        return $this->occurrence;
    }
}