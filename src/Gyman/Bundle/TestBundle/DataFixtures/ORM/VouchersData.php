<?php

namespace Gyman\Bundle\TestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;
use Symfony\Component\Yaml\Yaml;
use Doctrine\Common\Collections\ArrayCollection;

class VouchersData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $value = Yaml::parse(file_get_contents(__DIR__ . '/../Yaml/vouchers.yml'));

        foreach ($value as $key => $params) {
            $voucherObject = $this->insertVoucher($params);
            $this->addReference($key, $voucherObject);
        }
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
        extract($params);

        $voucher = new Voucher();
        $voucher->setAmount($amount);
        $voucher->setAmountLeft($amountLeft);
        $voucher->setEndDate(new \DateTime($endDate));
        $voucher->setStartDate(new \DateTime($startDate));
        $voucher->setPrice($price);

        if ($activities) {
            $activities = explode(",", $activities);
            $collection = new ArrayCollection();
            foreach ($activities as $activity) {
                $collection->add($this->getReference($activity));
            }
            $voucher->setActivities($collection);
        }

        $voucher->setMember($this->getReference($member));

        $this->manager->persist($voucher);
        $this->manager->flush();

        return $voucher;
    }
}
