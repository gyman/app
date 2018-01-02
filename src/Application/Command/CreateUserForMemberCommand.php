<?php

declare(strict_types=1);

namespace Gyman\Application\Command;

use Gyman\Domain\Member;

class CreateUserForMemberCommand
{
    /** @var Member */
    private $member;

    /** @var string */
    private $token;

    /** @var string */
    private $currentPassword;

    /**
     * CreateUserForMemberCommand constructor.
     *
     * @param Member $member
     * @param string $token
     * @param string $currentPassword
     */
    public function __construct(Member $member, string $token, string $currentPassword)
    {
        $this->member = $member;
        $this->token = $token;
        $this->currentPassword = $currentPassword;
    }

    /**
     * @return Member
     */
    public function member(): Member
    {
        return $this->member;
    }

    public function token(): string
    {
        return $this->token;
    }

    public function currentPassword(): string
    {
        return $this->currentPassword;
    }
}
