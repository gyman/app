<?php

namespace Gyman\Wallet\Event;

use Money\Currency;
use Money\Money;
use Prooph\EventSourcing\AggregateChanged;

class CreditWasMade extends AggregateChanged
{

    public static function withData(Money $amount) : self
    {
        return self::occur(self::aggregateId(), [
            "amount" => $amount->getAmount(),
            "currency" => $amount->getCurrency()->getCode()
        ]);
    }

    public function amount() : Money
    {
        return new Money($this->payload["amount"], new Currency($this->payload["currency"]));
    }
}