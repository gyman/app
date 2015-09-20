<?php
namespace Gyman\Domain\Command;

use Gyman\Domain\Model\Entry;
use Gyman\Domain\Model\Member;

/**
 * Class CloseEntryCommand
 * @package Gyman\Domain\Command
 */
final class CloseEntryCommand
{
    /**
     * @var Member
     */
    public $member;

    /**
     * @param Entry $entry
     * @return CloseEntryCommand
     */
    public static function createFromEntry(Entry $entry)
    {
        $command = new self();
        $command->member = $entry->member();

        return $command;
    }
}
