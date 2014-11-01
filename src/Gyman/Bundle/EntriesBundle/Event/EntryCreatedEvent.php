<?php

namespace Gyman\Bundle\EntriesBundle\Event;

use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class EntryCreatedEvent
 * @package Gyman\Bundle\EntrysBundle\Event
 */
class EntryCreatedEvent extends Event
{
    /**
     * @var Entry
     */
    protected $entry;

    /**
     * @param Entry $entry
     */
    public function __construct(Entry $entry)
    {
        $this->entry = $entry;
    }

    /**
     * @return Entry
     */
    public function getEntry()
    {
        return $this->entry;
    }
}