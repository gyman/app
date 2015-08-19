<?php

namespace Gyman\Component\Members\Event;

use Gyman\Component\Members\Model\Member;
use Symfony\Component\EventDispatcher\Event;

class MemberEvent extends Event
{
    /**
     * @var Member
     */
    private $member;

    /**
     * MemberEvent constructor.
     * @param Member $member
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }
}
