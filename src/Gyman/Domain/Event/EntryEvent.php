<?php
namespace Gyman\Domain\Event;

use Exception;
use Gyman\Domain\Model\Entry;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\UserInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class EntryEvent
 * @package Gyman\Domain
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
    public function __construct(Entry $entry, $author = null, $exception = null)
    {
        $this->entry = $entry;
        $this->author = $author;
        $this->exception = $exception;
    }
}
