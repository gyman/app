<?php
namespace Gyman\Bundle\ClubBundle\DataFixtures\StandardConnection\ORM;

use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\ClubBundle\Factory\ClubFactory;

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

        return $club;
    }
}
