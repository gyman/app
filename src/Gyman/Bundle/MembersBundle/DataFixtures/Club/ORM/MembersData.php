<?php
namespace Gyman\Bundle\MembersBundle\DataFixtures\Club\ORM;

use Dende\CommonBundle\DataFixtures\BaseFixture;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\MembersBundle\Factory\MemberFactory;

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
        $params['vouchers'] = new ArrayCollection();
        $params['entries'] = new ArrayCollection();
        $params['current_voucher'] = null;
        $params['last_entry'] = null;

        $member = MemberFactory::createFromArray($params);

        $this->manager->persist($member);
        $this->manager->flush();

        return $member;
    }
}
