<?php

namespace Gyman\Bundle\AppBundle\Event;

use Gyman\Bundle\AppBundle\Entity\Member;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class MemberCreatedEvent
 * @package Gyman\Bundle\AppBundle\Event
 */
class MemberEditedEvent extends Event
{
    /**
     * @var Member
     */
    protected $member;

    /**
     * @param Member $member
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
     * @return Member
     */
    public function getMember()
    {
        return $this->member;
    }
}
