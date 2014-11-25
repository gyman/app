<?php
namespace Gyman\Bundle\TestBundle\DataFixtures\StandardConnection\ORM;

use Gyman\Bundle\TestBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

class UsersData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return 1;
    }

    public function insert($params)
    {
        $club = $this->getClubs($params['clubs']);
        $currentClub = $this->getReference($params['clubs'][0]);

        $user = new User();
        $user->setUsername($params["username"]);
        $user->setFirstname($params["firstname"]);
        $user->setLastname($params["lastname"]);
        $user->setEmail($params["email"]);
        $user->setRoles($params["roles"]);
        $user->setClubs($club);
//        $user->setCurrentClub($currentClub);
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
