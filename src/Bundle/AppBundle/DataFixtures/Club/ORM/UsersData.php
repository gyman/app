<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Gyman\Bundle\AppBundle\DataFixtures\BaseFixture;
use Gyman\Domain\User;

class UsersData extends BaseFixture
{
    public function getOrder() : int
    {
        return 20;
    }

    public function insert(array $params = []) : User
    {
        $user = new User();
        $user->setUsername($params['username']);
        $user->setFirstname($params['firstname']);
        $user->setLastname($params['lastname']);
        $user->setEmail($params['email']);
        $user->setRoles($params['roles']);
        $user->setPlainPassword($params['plainPassword']);
        $user->setEnabled($params['enabled']);

        if(array_key_exists("member", $params) && null !== $params["member"]) {
            $user->setMember($this->getReference($params["member"]));
        }

        return $user;
    }
}
