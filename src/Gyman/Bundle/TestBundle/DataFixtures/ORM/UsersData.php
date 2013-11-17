<?php
namespace Gyman\Bundle\TestBundle\DataFixtures\ORM;

use Gyman\Bundle\TestBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

class UsersData extends BaseFixture
{
    public function getOrder()
    {
        return 1;
    }

    public function insert($params)
    {
        $user = new User();
        $user->setUsername($params["username"]);
        $user->setFirstname($params["firstname"]);
        $user->setLastname($params["lastname"]);
        $user->setEmail($params["email"]);
        $user->setRoles($params["roles"]);
        $user->setClubs($this->getClubs($params['clubs']));
        $user->setPlainPassword($params["plainPassword"]);
        $user->setEnabled($params["enabled"]);

        return $user;
    }

    private function getClubs($clubs)
    {
        $references = array();

        foreach ($clubs as $club) {
            $references[] = $this->getReference($club);
        }

        return new ArrayCollection($references);
    }
}
