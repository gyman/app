<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Carbon\Carbon;
use Gyman\Application\Factory\VoucherFactory;
use Gyman\Bundle\AppBundle\DataFixtures\BaseFixture;
use Gyman\Domain\Member;
use Gyman\Domain\Voucher;

class VouchersData extends BaseFixture
{
    public function getOrder(): int
    {
        return 20;
    }

    public function insert(array $array = []): Voucher
    {
        $array['startDate'] = Carbon::parse($array['startDate']);
        $array['endDate'] = Carbon::parse($array['endDate']);
        $array['price'] = ['amount' => $array['price'], 'currency' => 'PLN'];

        $voucher = VoucherFactory::createFromArray($array);

        /** @var Member $member */
        $member = $this->getReference($array['member']);
        $member->vouchers()->add($voucher);
        $voucher->setMember($member);

        if (array_key_exists('currentVoucher', $array) && true === $array['currentVoucher']) {
            $member->setCurrentVoucher($voucher);
        } elseif (array_key_exists('currentVoucher', $array) && false === $array['currentVoucher']) {
        } else {
            $member->updateCurrentVoucher();
        }

        $this->manager->persist($member);

        return $voucher;
    }
}
