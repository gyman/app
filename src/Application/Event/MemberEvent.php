<?php

declare(strict_types=1);

namespace Gyman\Application\Event;

use Gyman\Domain\Member;
use Gyman\Domain\UserInterface;
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
     *
     * @param Member        $member
     * @param UserInterface $author|null
     */
    public function __construct(Member $member, $author = null)
    {
        $this->member = $member;
        $this->author = $author;
    }
}
