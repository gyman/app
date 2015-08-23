<?php

namespace Gyman\Component\Members\Event;

use Gyman\Component\CoreDomain\Event\DomainEventInterface;
use Gyman\Component\CoreDomain\Model\UserInterface;
use Gyman\Component\Members\Model\Member;
use Symfony\Component\EventDispatcher\Event;

class MemberEvent extends Event implements DomainEventInterface
{
    /**
     * @var Member
     */
    private $member;

    /**
     * @var UserInterface
     */
    private $author;

    /**
     * MemberEvent constructor.
     * @param Member $member
     * @param UserInterface $author|null
     */
    public function __construct(Member $member, $author = null)
    {
        $this->member = $member;
        $this->author = $author;
    }
}
