<?php
namespace Gyman\Bundle\VouchersBundle\DataFixtures\Club\ORM;

use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\VouchersBundle\Factory\VoucherFactory;

class VouchersData extends BaseFixture
{
    protected $dir = __DIR__;

    public function insert($array)
    {
        $voucher = VoucherFactory::createFromArray([
            'member'        => $this->getReference($array['member']),
            'startDate'     => $array['startDate'],
            'endDate'       => $array['endDate'],
            'maximumAmount' => $array['amount'],
            'price'         => ['amount' => $array['price'], 'currency' => 'PLN'],
        ]);

        return $voucher;
    }

    public function getOrder()
    {
        return 20;
    }
}
