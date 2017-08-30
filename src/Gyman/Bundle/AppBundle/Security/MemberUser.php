<?php

namespace Gyman\Bundle\AppBundle\Security;

use FOS\UserBundle\Model\User;
use Gyman\Domain\Member;

class MemberUser extends User
{
    /** @var Member */
    private $member;

    /** @var string */
    private $token;

    /**
     * User constructor.
     * @param Member $member
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
        $this->username = $member->email()->email();
        $this->enabled = false;
        $this->roles = ['ROLE_MEMBER'];
    }

    /**
     * @return Member
     */
    public function member(): Member
    {
        return $this->member;
    }

    public function setToken(string $token)
    {
        $this->token = $token;
    }
}