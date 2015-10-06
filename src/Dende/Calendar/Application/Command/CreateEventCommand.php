<?php
namespace Dende\Calendar\Application\Command;

use DateTime;
use Dende\Calendar\Domain\Calendar;
use Gyman\Domain\Model\Section;

/**
 * Class CreateEventCommand
 * @package Gyman\Domain\Command
 */
final class CreateEventCommand
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var Section
     */
    public $section;

    /**
     * @var DateTime
     */
    public $startDate;

    /**
     * @var DateTime
     */
    public $endDate;

    /**
     * @var int
     */
    public $duration = 90;

    /**
     * @var string
     */
    public $title = '';

    /**
     * @var array
     */
    public $repetitionDays = [];
}
