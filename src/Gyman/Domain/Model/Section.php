<?php
namespace Gyman\Domain\Model;

use Dende\Calendar\Domain\Calendar;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @param SectionId $id
     * @param $title
     * @param Calendar $calendar
     */
    public function __construct(SectionId $id, $title, Calendar $calendar)
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
     * @return SectionId
     */
    public function id(){
        return $this->id;
    }

    /**
     * @param Member $member
     */
    public function addMember(Member $member)
    {
        $this->members->add($member);
    }
}
