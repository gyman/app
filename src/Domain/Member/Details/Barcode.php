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

    public function __construct(string $barcode)
    {
        $this->barcode = $barcode;
    }

    public function barcode() : string
    {
        return $this->barcode;
    }
}
