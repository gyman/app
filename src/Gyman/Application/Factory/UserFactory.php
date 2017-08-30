<?php
namespace Gyman\Application\Factory;

use Gyman\Bundle\AppBundle\Security\MemberUser;
use Gyman\Domain\Member;

class UserFactory
{
    public static function create(Member $member, string $password = null, string $salt, string $token) : MemberUser
    {
        $user = new MemberUser($member);
        $user->setToken($token);
        $user->setSalt($salt);
        $user->setPassword($password);

        return $user;
    }
}