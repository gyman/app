<?php

namespace Gyman\Bundle\AppBundle\Security;

use Gyman\Domain\Member;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

class MemberUser implements UserInterface, EquatableInterface
{
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $salt;

    /** @var array */
    private $roles;

    /** @var Member */
    private $member;

    public function __construct(string $username, string $password, string $salt, array $roles, Member $member)
    {
        $this->username = $username;
        $this->password = $password;
        $this->salt = $salt;
        $this->roles = $roles;
        $this->member = $member;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {

    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof MemberUser) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->salt !== $user->getSalt()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }

    /**
     * @return Member
     */
    public function member(): Member
    {
        return $this->member;
    }
}