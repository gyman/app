<?php
namespace Gyman\Domain\Command;
use Gyman\Bundle\AppBundle\Entity\Section;

/**
 * Class SearchMemberCommand
 * @package Gyman\Domain\Command
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
