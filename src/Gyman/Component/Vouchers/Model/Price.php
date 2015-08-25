<?php
namespace Gyman\Component\Vouchers\Model;

/**
 * Class Price
 * @package Gyman\Component\Vouchers
 */
class Price
{
    /**
     * @var integer
     */
    protected $amount;

    /**
     * @var string
     */
    protected $currency;

    /**
     * Price constructor.
     * @param int $amount
     * @param string $currency
     */
    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s %s', $this->amount, $this->currency);
    }
}
