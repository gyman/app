<?php
namespace Gyman\Bundle\MembersBundle\Event;

use Gyman\Bundle\MembersBundle\Entity\Member;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class MemberCreatedEvent
 * @package Gyman\Bundle\MembersBundle\Event
 */
class MemberCreatedEvent extends Event
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
