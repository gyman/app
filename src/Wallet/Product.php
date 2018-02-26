<?php
namespace Gyman\Wallet;

use Money\Money;
use Ramsey\Uuid\UuidInterface;

class Product
{
    /** @var UuidInterface */
    protected $id;

    /** @var UuidInterface */
    protected $name;

    /** @var Money */
    protected $totalPrice;

    /** @var integer */
    protected $amount;

    public function __construct(UuidInterface $id, UuidInterface $name, Money $totalPrice, int $amount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->totalPrice = $totalPrice;
        $this->amount = $amount;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function name(): UuidInterface
    {
        return $this->name;
    }

    public function totalPrice(): Money
    {
        return $this->totalPrice;
    }

    public function amount(): int
    {
        return $this->amount;
    }
}