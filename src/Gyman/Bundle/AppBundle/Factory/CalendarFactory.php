<?php
namespace Gyman\Bundle\AppBundle\Factory;

use Dende\Calendar\Application\Factory\CalendarFactory as BaseCalendarFactory;
use Gyman\Domain\Calendar;

/**
 * Class CalendarFactory
 * @package Dende\Calendar\Application\Factory
 */
class CalendarFactory extends BaseCalendarFactory
{
    /**
     * @param $params
     * @return Calendar
     */
    public function createFromArray($array)
    {
        $template = [
            'id'                     => $this->idGenerator->generateId(),
            'title'                  => '',
        ];

        $array = array_merge($template, $array);

        return new Calendar(
            $array['id'],
            $array['title']
        );
    }
}
