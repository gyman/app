<?php
namespace Gyman\Domain;

use Dende\Calendar\Domain\Calendar as BaseCalendar;

class Calendar extends BaseCalendar
{
    /**
     * @var Section
     */
    protected $section;

    /**
     * @return Section
     */
    public function section()
    {
        return $this->section;
    }
}
