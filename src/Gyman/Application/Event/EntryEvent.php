<?php
namespace Gyman\Application\Event;

use Exception;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Gyman\Domain\UserInterface;
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

    /**
     * @return Entry
     */
    public function getEntry()
    {
        return $this->entry;
    }
}
