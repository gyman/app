<?php
namespace Gyman\Bundle\TestBundle\DataFixtures\StandardConnection\ORM;

use Gyman\Bundle\DefaultBundle\Services\CredentialsStorage;
use Gyman\Bundle\TestBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\ClubBundle\Entity\Club;

class ClubsData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return -1;
    }

    public function insert($params)
    {
        $club = new Club();
        $club->setName($params["name"]);
        $club->setSubdomain($params["subdomain"]);
        $club->setDatabase($this->getDb($params["database"]));

        $this->manager->persist($club);
        $this->manager->flush();

        return $club;
    }

    private function getDb($database)
    {
        return [
            CredentialsStorage::PARAM_BASE => $database["name"],
            CredentialsStorage::PARAM_USER => $database["user"],
            CredentialsStorage::PARAM_PASS => $database["password"],
        ];
    }
}
