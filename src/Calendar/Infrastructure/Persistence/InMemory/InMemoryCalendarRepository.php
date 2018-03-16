<?php
namespace Gyman\Calendar\Infrastructure\Persistence\InMemory;

use Gyman\Calendar\Application\Repository\CalendarRepositoryInterface;
use Gyman\Calendar\Domain\Calendar;
use Doctrine\Common\Collections\ArrayCollection;

class InMemoryCalendarRepository implements CalendarRepositoryInterface
{
    /**
     * @var Calendar[]|ArrayCollection
     */
    private $calendars;

    public function __construct()
    {
        $this->calendars = new ArrayCollection();
    }

    public function findAll() : ArrayCollection
    {
        return $this->calendars;
    }

    public function insert(Calendar $calendar)
    {
        $this->calendars[$calendar->id()->__toString()] = $calendar;
    }

    public function update(Calendar $calendar)
    {
        $this->calendars[$calendar->id()->__toString()] = $calendar;
    }

    public function remove(Calendar $calendar)
    {
        unset($this->calendars[$calendar->id()->__toString()]);
    }

    public function findOneByCalendarId(string $calendarId) : Calendar
    {
        return $this->calendars[$calendarId];
    }
}
