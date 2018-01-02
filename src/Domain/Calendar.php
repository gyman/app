<?php

declare(strict_types=1);

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
    public function section(): Section
    {
        return $this->section;
    }

    public function updateTitle(string $title)
    {
        $this->title = $title;
    }
}
