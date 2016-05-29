<?php
namespace Gyman\Bundle\ClubBundle\DataFixtures\StandardConnection\ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\ClubBundle\Entity\User;

class UsersData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return -10;
    }

    public function insert($params)
    {
        $user = new User();
        $user->setUsername($params['username']);
        $user->setFirstname($params['firstname']);
        $user->setLastname($params['lastname']);
        $user->setEmail($params['email']);
        $user->setRoles($params['roles']);
        $user->setPlainPassword($params['plainPassword']);
        $user->setEnabled($params['enabled']);

        return $user;
    }

    private function getClubs($clubs)
    {
        $references = [];

        foreach ($clubs as $club) {
            $references[] = $this->getReference($club);
        }

        return new ArrayCollection($references);
    }
}
