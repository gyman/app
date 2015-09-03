<?php
namespace Gyman\Component\Members\Model;

/**
 * Class Barcode
 * @package Gyman\Component\Members
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
