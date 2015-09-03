<?php
namespace Gyman\Bundle\VouchersBundle\DataFixtures\Club\ORM;

use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;
use Gyman\Bundle\VouchersBundle\Factory\VoucherFactory;

class VouchersData extends BaseFixture
{
    protected $dir = __DIR__;

    public function insert($array)
    {
        $voucher = VoucherFactory::createFromArray($array);

        return $voucher;
    }

    public function getOrder()
    {
        return 20;
    }

    /**
     * @param $params
     * @return Voucher
     */
    private function insertVoucher($params)
    {
        //        extract($params);
//
//        $voucher = new Voucher();
//        $voucher->setAmount($amount);
//        $voucher->setAmountLeft($amountLeft);
//        $voucher->setEndDate(new \DateTime($endDate));
//        $voucher->setStartDate(new \DateTime($startDate));
//        $voucher->setPrice($price);
//
//        if ($activities) {
//            $activities = explode(',', $activities);
//            $collection = new ArrayCollection();
//            foreach ($activities as $activity) {
//                $collection->add($this->getReference($activity));
//            }
//            $voucher->setActivities($collection);
//        }
//
//        $voucher->setMember($this->getReference($member));
//
//        $this->manager->persist($voucher);
//        $this->manager->flush();

//        return $voucher;
    }
}
