<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Event;

use Gyman\Domain\Member;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class MemberCreatedEvent.
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
