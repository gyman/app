<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Dende\CommonBundle\DataFixtures\BaseFixture;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\AppBundle\Entity\Voucher;
use Gyman\Bundle\AppBundle\Factory\MemberFactory;

class MembersData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return 10;
    }

    public function insert($params)
    {
        $params['sections'] = new ArrayCollection();
        $params['entries'] = new ArrayCollection();
        $params['vouchers'] = new ArrayCollection();
        $params['current_voucher'] = null;
        $params['last_entry'] = null;

        $member = MemberFactory::createFromArray($params);

        if (array_key_exists('Voucher', $params) && is_array($params['Voucher']) && count($params['Voucher']) > 0) {
            foreach ($params['Voucher'] as $voucherRef) {
                /** @var Voucher $voucher */
                $voucher = $this->getReference($voucherRef);
                $member->addVoucher($voucher);
            }
        }

        $this->manager->persist($member);
        $this->manager->flush();

        return $member;
    }
}
