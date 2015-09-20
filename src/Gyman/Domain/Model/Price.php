<?php
namespace Gyman\Domain\Model;

/**
 * Class Price
 * @package Gyman\Domain
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
    protected $currency = 'PLN';

    /**
     * Price constructor.
     * @param int $amount
     * @param string $currency
     */
    public function __construct($amount, $currency = 'PLN')
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public static function zero()
    {
        return new self(0, 'PLN');
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->amount() > 0) {
            return sprintf('%s %s', $this->amount, $this->currency);
        }

        return '';
    }

    /**
     * @return int
     */
    public function amount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function currency()
    {
        return $this->currency;
    }
}
