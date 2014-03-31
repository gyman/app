<?php

namespace Dende\ScheduleBundle\Entity;

use Dende\ScheduleBundle\Entity\Event;
use \DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Criteria;

/**
 * @ORM\Entity(repositoryClass="Dende\ScheduleBundle\Entity\EventRepository")
 */
class RecurringEvent extends Event {

    // <editor-fold defaultstate="collapsed" desc="members">
    /**
     * @var integer 
     * @ORM\Column(name="time_interval", type="integer", nullable = true)
     */
    private $interval; // </editor-fold>
    protected $type = "recurring";

    // <editor-fold defaultstate="collapsed" desc="getters and setters">

    public function getEndDate() {
        return $this->endDate;
    }

    public function getInterval() {
        return $this->interval;
    }

    public function setEndDate(\DateTime $endDate) {
        $this->endDate = $endDate;
    }

    public function setInterval($interval) {
        $this->interval = $interval;
    }

// </editor-fold>

    /**
     * @param int $year
     * @param int $weekNumber
     * @return DateTime
     */
    public function getOccurenceForWeekNumber($year, $weekNumber) {
        $weekStart = new \DateTime(sprintf("%d-W%d-1", $year, $weekNumber));
        $eventDate = $this->getStartDate();
        $interval = new \DateInterval(sprintf("PT%dS", $this->getInterval()));

        while ($eventDate->getTimestamp() < $weekStart->getTimestamp()) {
            $eventDate->add($interval);
        }

        return $eventDate;
    }

    public function isDeletedForDate(DateTime $date) {
        if ($this->meta->count() == 0)
        {
            return false;
        }

        $result = array_filter($this->meta->toArray(), function(EventMeta $meta) use ($date) {
            $isDeleted = $meta->getKey() == "deleted";
            $isDateSame = $meta->getStartDate()->getTimestamp() == $date->getTimestamp();
            if (!$isDeleted || !$isDateSame)
            {
                return false;
            }
            return true;
        });

        if (count($result) == 0)
        {
            return false;
        }

        return true;
    }

}
