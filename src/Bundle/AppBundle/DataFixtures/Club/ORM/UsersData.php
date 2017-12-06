<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Domain\User;

class UsersData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return 20;
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

        if(array_key_exists("member", $params) && null !== $params["member"]) {
            $user->setMember($this->getReference($params["member"]));
        }

        return $user;
    }
}