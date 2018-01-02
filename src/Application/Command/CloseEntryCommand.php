<?php

declare(strict_types=1);

namespace Gyman\Application\Command;

use Gyman\Domain\Entry;
use Gyman\Domain\Member;

/**
 * Class CloseEntryCommand.
 */
final class CloseEntryCommand
{
    /**
     * @var Member
     */
    public $member;

    /** @var Entry */
    public $entry;

    /**
     * @param Entry $entry
     *
     * @return CloseEntryCommand
     */
    public static function createFromEntry(Entry $entry)
    {
        $command = new self();
        $command->member = $entry->member();
        $command->entry = $entry;

        return $command;
    }
}
