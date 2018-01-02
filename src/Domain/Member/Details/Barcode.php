<?php

declare(strict_types=1);

namespace Gyman\Domain\Member\Details;

/**
 * Class Barcode.
 */
class Barcode
{
    /**
     * @var string
     */
    protected $barcode;

    /**
     * Barcode constructor.
     *
     * @param string $barcode
     */
    public function __construct($barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * @return string
     */
    public function barcode()
    {
        return $this->barcode;
    }
}
