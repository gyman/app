<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Application\Factory\MemberFactory;
use Gyman\Bundle\AppBundle\DataFixtures\BaseFixture;
use Gyman\Domain\Member;

class MembersData extends BaseFixture
{
    public function getOrder(): int
    {
        return 10;
    }

    public function insert(array $params = []): Member
    {
        $factoryParams = $params;
        $factoryParams['sections'] = new ArrayCollection();
        $factoryParams['entries'] = new ArrayCollection();
        $factoryParams['vouchers'] = new ArrayCollection();
        $factoryParams['current_voucher'] = null;
        $factoryParams['last_entry'] = null;

        $member = MemberFactory::createFromArray($factoryParams);

        foreach ($params['sections'] as $sectionName) {
            $member->sections()->add($this->getReference($sectionName));
        }

        return $member;
    }
}
