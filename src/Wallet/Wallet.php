<?php

namespace Gyman\Wallet;

use Gyman\Wallet\Event\CreditWasMade;
use Gyman\Wallet\Event\DebitWasMade;
use Gyman\Wallet\Event\WalletWasCreated;
use Money\Currency;
use Money\Money;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;
use Ramsey\Uuid\UuidInterface;

class Wallet extends AggregateRoot
{
    /** @var  UuidInterface */
    protected $id;

    /** @var  UuidInterface */
    protected $userId;

    /** @var Money */
    protected $balance;

    protected function aggregateId(): string
    {
        return $this->id->toString();
    }

    public static function create(UuidInterface $id, UuidInterface $userId, Currency $currency) : self
    {
        $transaction = new self();
        $transaction->recordThat(WalletWasCreated::withData($id, $userId, $currency));

        return $transaction;
    }

    public function credit(Money $amount)
    {
        $this->recordThat(CreditWasMade::withData($amount));
    }

    public function debit(Product $product)
    {
        $this->recordThat(DebitWasMade::withData($product));
    }

    protected function apply(AggregateChanged $event): void
    {
        $method = 'when' . get_class_last_part($event);
        $this->{$method}($event);
    }

    protected function whenWalletWasCreated(WalletWasCreated $event) {
        $this->id = $event->id();
        $this->balance = new Money(0, $event->currency());
    }

    protected function whenDebitWasMade(DebitWasMade $event) {
        $this->balance = $this->balance->subtract($event->amount());
    }

    protected function whenCreditWasMade(CreditWasMade $event) {
        $this->balance = $this->balance->add($event->amount());
    }
}