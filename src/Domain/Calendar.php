<?php
namespace Gyman\Domain;

use DateTime;
use Dende\Calendar\Domain\Calendar as BaseCalendar;

class Calendar extends BaseCalendar
{
    /** @var Section */
    protected $section;

    public function __construct($calendarId = null, string $title = '', $events = null, ?Section $section)
    {
        parent::__construct($calendarId, $title, $events);

        if($section !== null) {
            $this->section = $section;
            $this->section->setCalendar($this);
        }

        $this->createdAt = new DateTime();
    }

    public function section() : ?Section
    {
        return $this->section;
    }

    public function updateTitle(string $title) : void
    {
        $this->title = $title;
    }
}
