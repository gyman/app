<?php
namespace Dende\Calendar\Application\Command;

use DateTime;
use Dende\Calendar\Domain\Calendar\Event\Occurrence;
use Gyman\Domain\Model\Section;

/**
 * Class CreateEventCommand
 * @package Gyman\Domain\Command
 */
final class UpdateEventCommand
{
    /**
     * @var Occurrence
     */
    public $occurrence;

    /**
     * @var string
     */
    public $method;

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
