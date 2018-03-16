<?php
namespace Gyman;

use Carbon\Carbon;
use DateTime;
use DateTimeImmutable;
use Gyman\Domain\MemberView;
use Money\Currency;
use Money\Money;

function carbonite(DateTimeImmutable $dateTimeImmutable) : Carbon
{
    $dateTime = new DateTime(null, $dateTimeImmutable->getTimezone());
    $dateTime->setTimestamp($dateTimeImmutable->getTimestamp());

    return Carbon::instance($dateTime);
}

function get_class_last_part($object) : string {
    if(!is_object($object)) {
        throw new \InvalidArgumentException('Argument #0 must be an object');
    }

    return array_slice(explode("\\", get_class($object)), -1)[0];
}

function money2string(Money $money) : string {
    return sprintf("%s|%s", $money->getCurrency()->getCode(), $money->getAmount());
}

function string2money(string $moneyString) : Money {
    list($currency, $amount) = explode("|", $moneyString);
    return new Money($amount, new Currency($currency));
}

function sortMemberViewsByCurrentVoucher(MemberView $a, MemberView $b) : int
{
    if ($a->currentVoucherId() !== null) {
        return 1;
    }

    if ($b->currentVoucherId() !== null) {
        return -1;
    }

    return 0;
}