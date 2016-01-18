<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Dende\CommonBundle\DataFixtures\BaseFixture;
use Doctrine\Common\Collections\ArrayCollection;
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
        $factoryParams = $params;
        $factoryParams['sections'] = new ArrayCollection();
        $factoryParams['entries'] = new ArrayCollection();
        $factoryParams['vouchers'] = new ArrayCollection();
        $factoryParams['current_voucher'] = null;
        $factoryParams['last_entry'] = null;

        $member = MemberFactory::createFromArray($factoryParams);

        foreach($params["sections"] as $sectionName)
        {
            $member->sections()->add($this->getReference($sectionName));
        }

        $this->manager->persist($member);
        $this->manager->flush();

        return $member;
    }
}
