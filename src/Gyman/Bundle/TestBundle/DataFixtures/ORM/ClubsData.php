<?php
namespace Gyman\Bundle\TestBundle\DataFixtures\ORM;

use Gyman\Bundle\TestBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\ClubBundle\Entity\Club;

class ClubsData extends BaseFixture
{
    public function getOrder()
    {
        return -1;
    }
    public function insert($params)
    {
        $club = new Club();
        $club->setName($params["name"]);

        $this->manager->persist($club);
        $this->manager->flush();

        return $club;
    }
}
