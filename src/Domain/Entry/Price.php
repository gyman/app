<?php
namespace Gyman\Domain\Entry;

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

    public function __construct(int $amount, ?string $currency = 'PLN')
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public static function zero() : self
    {
        return new self(0, 'PLN');
    }

    public function __toString() : string
    {
        if ($this->amount() > 0) {
            return sprintf('%s %s', $this->amount, $this->currency);
        }

        return '';
    }

    public function amount() : int
    {
        return $this->amount;
    }

    public function currency() : string
    {
        return $this->currency;
    }
}
