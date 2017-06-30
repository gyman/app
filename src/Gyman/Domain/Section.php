<?php
namespace Gyman\Domain;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class Section
 * @package Gyman\Domain
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
    public function __construct($id = null, $title = '', Calendar $calendar = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->calendar = $calendar;
        $this->members = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function title() : string
    {
        return $this->title;
    }

    /**
     * @return Calendar
     */
    public function calendar() : Calendar
    {
        return $this->calendar;
    }

    /**
     * @return string
     */
    public function id() : string
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
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
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

    /**
     * @param Member[]|Collection $members
     */
    public function setMembers(Collection $members)
    {
        $this->members = $members;
    }
}
