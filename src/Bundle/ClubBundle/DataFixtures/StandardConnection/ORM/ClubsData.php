<?php
namespace Gyman\Bundle\ClubBundle\DataFixtures\StandardConnection\ORM;

use Gyman\Bundle\AppBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Factory\ClubFactory;

class ClubsData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder() : int
    {
        return -1;
    }

    public function insert(array $params = []) : Club
    {
        return ClubFactory::createFromArray($params);
    }
}
