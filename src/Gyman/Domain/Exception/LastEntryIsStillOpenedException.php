<?php
namespace Gyman\Domain\Exception;
use Gyman\Bundle\AppBundle\Entity\Entry;

/**
 * Class LastEntryIsStillOpenedException
 * @package Gyman\Domain
 */
class LastEntryIsStillOpenedException extends \Exception
{
    protected $message = 'Last entry %s is still opened, cannot add new one %s to %s member';

    /** @var Entry */
    private $entry;

    /** @var Entry */
    private $lastEntry;

    /**
     * LastEntryIsStillOpenedException constructor.
     * @param Entry $entry
     * @param Entry $lastEntry
     */
    public function __construct(Entry $entry, Entry $lastEntry)
    {
        $this->entry = $entry;
        $this->lastEntry = $lastEntry;

        $this->message = sprintf($this->message, $this->lastEntry->id(), $this->entry->id(), $this->lastEntry->member()->id());
    }
}
