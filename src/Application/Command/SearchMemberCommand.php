<?php

declare(strict_types=1);

namespace Gyman\Application\Command;

use Gyman\Domain\Section;

/**
 * Class SearchMemberCommand.
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
     * @var bool
     */
    public $hasVoucher;
    /**
     * @var bool
     */
    public $hasOpenedEntry;

    /**
     * @var bool
     */
    public $starred;

    /**
     * @var string
     */
    public $belt;
}
