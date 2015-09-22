<?php
namespace Gyman\Bundle\TestBundle\DataFixtures\StandardConnection\ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\TestBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\UserBundle\Entity\User;

class UsersData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return 1;
    }

    public function insert($params)
    {
        $clubsCollection = $this->getClubs($params['clubs']);
        $currentClub = $this->getReference($params['clubs'][0]);

        $user = new User();
        $user->setUsername($params['username']);
        $user->setFirstname($params['firstname']);
        $user->setLastname($params['lastname']);
        $user->setEmail($params['email']);
        $user->setRoles($params['roles']);
        $user->setClubs($clubsCollection);
        $user->setCurrentClub($currentClub);
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
