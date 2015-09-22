<?php

namespace Gyman\Domain\Event;

use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\UserInterface;
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
