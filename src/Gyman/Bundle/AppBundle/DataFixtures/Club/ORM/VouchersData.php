<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Carbon\Carbon;
use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\AppBundle\Entity\Member;
use Gyman\Bundle\AppBundle\Factory\VoucherFactory;

class VouchersData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return 20;
    }

    public function insert($array)
    {
        $array['startDate'] = Carbon::parse($array['startDate']);
        $array['endDate'] = Carbon::parse($array['endDate']);

        $voucher = VoucherFactory::createFromArray($array);

        /** @var Member $member */
        $member = $this->getReference($array['member']);
        $member->addVoucher($voucher);

        $this->manager->persist($member);

        return $voucher;
    }
}
