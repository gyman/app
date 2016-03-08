<?php
namespace Gyman\Application\Command;
use Gyman\Domain\Section;

/**
 * Class SearchMemberCommand
 * @package Gyman\Application\Command
 */
class SearchMemberCommand
{
    /**
     * @var string
     */
    public $query;

    /**
     * @var Section
     */
    public $section;

    /**
     * @var boolean
     */
    public $hasVoucher;
    /**
     * @var boolean
     */
    public $hasOpenedEntry;

    /**
     * @var boolean
     */
    public $starred;

    /**
     * @var string
     */
    public $belt;
}
