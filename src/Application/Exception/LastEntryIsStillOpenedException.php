<?php

declare(strict_types=1);

namespace Gyman\Application\Exception;

use Gyman\Domain\Entry;

/**
 * Class LastEntryIsStillOpenedException.
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
     *
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
