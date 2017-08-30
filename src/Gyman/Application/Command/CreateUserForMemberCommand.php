<?php
namespace Gyman\Application\Command;

use Gyman\Domain\Member;

class CreateUserForMemberCommand
{
    /** @var Member */
    private $member;

    /** @var string */
    private $token;

    /**
     * CreateUserForMemberCommand constructor.
     * @param Member $member
     * @param string $token
     */
    public function __construct(Member $member, string $token)
    {
        $this->member = $member;
        $this->token = $token;
    }

    /**
     * @return Member
     */
    public function member(): Member
    {
        return $this->member;
    }

    public function token() : string
    {
        return $this->token;
    }
}