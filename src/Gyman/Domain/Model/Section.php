<?php
namespace Gyman\Domain\Model;

use Dende\Calendar\Domain\Calendar;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Section
 * @package Gyman\Domain\Model
 */
class Section
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var Calendar
     */
    protected $calendar;

    /**
     * @var Member[]|ArrayCollection
     */
    protected $members;

    /**
     * Section constructor.
     * @param string $id
     * @param string $title
     * @param Calendar $calendar
     */
    public function __construct($id = null, $title = '', Calendar $calendar)
    {
        $this->id = $id;
        $this->title = $title;
        $this->calendar = $calendar;
        $this->members = new ArrayCollection();
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

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param Member $member
     */
    public function addMember(Member $member)
    {
        $this->members->add($member);
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param Calendar $calendar
     */
    public function setCalendar(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }
}
