<?php

namespace Gyman\Bundle\ClubBundle\DataFixtures\StandardConnection\ORM;

use Gyman\Bundle\ClubBundle\Factory\ClubFactory;
use Dende\CommonBundle\DataFixtures\BaseFixture;

class ClubsData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return -1;
    }

    public function insert($params)
    {
        $club = ClubFactory::createFromArray($params);

        $this->manager->persist($club);
        $this->manager->flush();

        return $club;
    }
}
