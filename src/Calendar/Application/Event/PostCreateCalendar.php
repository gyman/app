<?php
namespace Gyman\Calendar\Application\Event;

use Gyman\Calendar\Domain\Calendar;
use Symfony\Component\EventDispatcher\Event;

class PostCreateCalendar extends Event
{
    protected $calendar;

    /**
     * PostCreateCalendar constructor.
     *
     * @param $calendar
     */
    public function __construct(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }
}
