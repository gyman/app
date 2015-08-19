<?php

namespace Gyman\Component\Members\Model;

/**
 * Class Barcode
 * @package Gyman\Component\Members\Model
 */
class Barcode
{
    /**
     * @var string
     */
    protected $barcode;

    /**
     * Barcode constructor.
     * @param int $barcode
     */
    public function __construct($barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }
}
