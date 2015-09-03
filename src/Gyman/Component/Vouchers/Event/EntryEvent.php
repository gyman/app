<?php
namespace Gyman\Component\Vouchers\Event;

use Exception;
use Gyman\Component\CoreDomain\Event\DomainEventInterface;
use Gyman\Component\CoreDomain\Model\UserInterface;
use Gyman\Component\Members\Model\Member;
use Gyman\Component\Vouchers\Model\Entry;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class EntryEvent
 * @package Gyman\Component\Vouchers
 */
class EntryEvent extends Event implements DomainEventInterface
{
    /**
     * @var Entry
     */
    private $entry;

    /**
     * @var UserInterface
     */
    private $author;

    /**
     * @var Member
     */
    private $member;

    /**
     * @var Exception
     */
    private $exception;

    /**
     * EntryEvent constructor.
     * @param Member $member
     * @param Entry $entry
     * @param UserInterface $author |null
     * @param Exception $exception
     */
    public function __construct(Member $member, Entry $entry, $author = null, $exception = null)
    {
        $this->member = $member;
        $this->entry = $entry;
        $this->author = $author;
        $this->exception = $exception;
    }
}
