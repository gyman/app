<?php
namespace Gyman\Domain\Member\Details;

/**
 * Class Barcode
 * @package Gyman\Domain
 */
class Barcode
{
    /**
     * @var string
     */
    protected $barcode;

    /**
     * Barcode constructor.
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
