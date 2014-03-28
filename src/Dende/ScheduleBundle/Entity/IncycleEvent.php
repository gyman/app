<?php

namespace Dende\ScheduleBundle\Entity;

use Dende\ScheduleBundle\Entity\SingleEvent;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Dende\ScheduleBundle\Entity\EventRepository")
 */
class IncycleEvent extends SingleEvent {

    /**
     * @ORM\OneToOne(targetEntity="Dende\ScheduleBundle\Entity\RecurringEvent")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    protected $recurringEvent;
    protected $type = "incycle";

    public function getRecurringEvent() {
        return $this->recurringEvent;
    }

    public function setRecurringEvent($recurringEvent) {
        $this->recurringEvent = $recurringEvent;
    }

}
