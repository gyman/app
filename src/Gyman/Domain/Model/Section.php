<?php
namespace Gyman\Domain\Model;

use Dende\Calendar\Domain\Calendar;
use Gyman\Domain\Model\Section\SectionId;

/**
 * Class Section
 * @package Gyman\Domain\Model
 */
class Section
{
    /**
     * @var SectionId
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var Calendar
     */
    private $calendar;

    /**
     * @var Member[]
     */
    private $members = [];

    /**
     * Section constructor.
     * @param SectionId $id
     * @param $title
     * @param Calendar $calendar
     */
    public function __construct(SectionId $id, $title, Calendar $calendar)
    {
        $this->id = $id;
        $this->title = $title;
        $this->calendar = $calendar;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return Calendar
     */
    public function calendar()
    {
        return $this->calendar;
    }

    public function id(){
        return $this->id;
    }
}
