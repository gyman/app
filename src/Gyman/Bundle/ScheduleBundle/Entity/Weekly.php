<?php

namespace Gyman\Bundle\ScheduleBundle\Entity;

use \DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Gyman\Bundle\ScheduleBundle\Entity\EventRepository")
 * @codeCoverageIgnore
 */
class Weekly extends Event
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="sunday", type="boolean", nullable = true)
     */
    private $sunday;

    /**
     * @var boolean
     *
     * @ORM\Column(name="monday", type="boolean", nullable = true)
     */
    private $monday;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tuesday", type="boolean", nullable = true)
     */
    private $tuesday;

    /**
     * @var boolean
     *
     * @ORM\Column(name="wednesday", type="boolean", nullable = true)
     */
    private $wednesday;

    /**
     * @var boolean
     *
     * @ORM\Column(name="thursday", type="boolean", nullable = true)
     */
    private $thursday;

    /**
     * @var boolean
     *
     * @ORM\Column(name="friday", type="boolean", nullable = true)
     */
    private $friday;

    /**
     * @var boolean
     *
     * @ORM\Column(name="saturday", type="boolean", nullable = true)
     */
    private $saturday;
    protected $type = "weekly";

// <editor-fold defaultstate="collapsed" desc="setters getters">

    public function getSunday()
    {
        return $this->sunday;
    }

    public function getMonday()
    {
        return $this->monday;
    }

    public function getTuesday()
    {
        return $this->tuesday;
    }

    public function getWednesday()
    {
        return $this->wednesday;
    }

    public function getThursday()
    {
        return $this->thursday;
    }

    public function getFriday()
    {
        return $this->friday;
    }

    public function getSaturday()
    {
        return $this->saturday;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setSunday($sunday)
    {
        $this->sunday = $sunday;

        return $this;
    }

    public function setMonday($monday)
    {
        $this->monday = $monday;

        return $this;
    }

    public function setTuesday($tuesday)
    {
        $this->tuesday = $tuesday;

        return $this;
    }

    public function setWednesday($wednesday)
    {
        $this->wednesday = $wednesday;

        return $this;
    }

    public function setThursday($thursday)
    {
        $this->thursday = $thursday;

        return $this;
    }

    public function setFriday($friday)
    {
        $this->friday = $friday;

        return $this;
    }

    public function setSaturday($saturday)
    {
        $this->saturday = $saturday;

        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

// </editor-fold>

    /**
     * @param  int      $year
     * @param  int      $weekNumber
     * @return DateTime
     */
    public function getOccurenceForWeekNumber($year, $weekNumber)
    {
        $weekStart = new \DateTime(sprintf("%d-W%d-1", $year, $weekNumber));
        $eventDate = $this->getStartDate();
        $interval = new \DateInterval(sprintf("PT%dS", $this->getInterval()));

        while ($eventDate->getTimestamp() < $weekStart->getTimestamp()) {
            $eventDate->add($interval);
        }

        return $eventDate;
    }

    public function isDeletedForDate(DateTime $date)
    {
        if ($this->meta->count() == 0) {
            return false;
        }

        $result = array_filter($this->meta->toArray(), function (EventMeta $meta) use ($date) {
            $isDeleted = $meta->getKey() == "deleted";
            $isDateSame = $meta->getStartDate()->getTimestamp() == $date->getTimestamp();
            if (!$isDeleted || !$isDateSame) {
                return false;
            }

            return true;
        });

        if (count($result) == 0) {
            return false;
        }

        return true;
    }
}
