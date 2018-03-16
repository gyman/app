<?php
namespace Gyman\Bundle\AppBundle\Factory;

use Gyman\Calendar\Application\Factory\CalendarFactory as BaseCalendarFactory;
use Gyman\Calendar\Domain\Calendar as BaseCalendar;
use Gyman\Calendar\Domain\Calendar\CalendarId;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Calendar;

/**
 * Class CalendarFactory
 * @package Gyman\Calendar\Application\Factory
 */
class CalendarFactory extends BaseCalendarFactory
{
    
    public function createFromArray(array $array = []) : BaseCalendar
    {
        $template = [
            'calendarId' => CalendarId::create(),
            'title'      => '',
            'events'     => [],
        ];

        $array = array_merge($template, $array);

        return new Calendar(
            $array['calendarId'],
            $array['title'],
            new ArrayCollection($array['events']),
            null
        );
    }
}
