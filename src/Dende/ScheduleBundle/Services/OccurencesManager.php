<?php

namespace Dende\ScheduleBundle\Services;

use Dende\ScheduleBundle\Entity as Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Dende\ScheduleBundle\Services\OccurencesManager;

class OccurencesManager {
// <editor-fold defaultstate="collapsed" desc="members">

    /**
     *
     * @var EntityManager 
     */
    private $entityManager;

    /**
     *
     * @var Router 
     */
    private $router;

    /**
     *
     * @var array 
     */
    private $weekdays = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];

    /**
     * 
     * @var array
     */
    private $colors = [
        "#CC3366", "#D8648B", "#64D8B1", "#33CC99",
        "#CC33B3", "#9933CC", "#4D33CC", "#CC4D33",
        "#E495AF", "#3366CC", "#33B3CC", "#66CC33",
    ]; // </editor-fold>

// <editor-fold defaultstate="collapsed" desc="setters and getters">

    public function getEntityManager() {
        return $this->entityManager;
    }

    /**
     * 
     * @param EntityManager $entityManager
     * @return OccurencesManager
     */
    public function setEntityManager(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * 
     * @return Router
     */
    public function getRouter() {
        return $this->router;
    }

    public function setRouter(Router $router) {
        $this->router = $router;
        return $this;
    }

// </editor-fold>

    public function addOccurencesForEvent(Entity\Event $event) {
        if ($event instanceof Entity\Single)
        {
            $this->insertSingleOccurence($event);
        }

        if ($event instanceof Entity\Weekly)
        {
            $this->insertWeeklyOccurences($event);
        }
    }

    private function insertWeeklyOccurences(Entity\Weekly $event) {
        $days = $this->getDays($event);
        $startDate = clone($event->getStartDate());
        $hour = $event->getStartDate()->format("H:i");

        $this->setupDaysArrayToNearestDay($startDate, $days);
        
        while ($startDate->getTimestamp() <= $event->getEndDate()->getTimestamp()) {
            $day = current($days) == false ? reset($days) : current($days);
            $occurence = new Entity\Serial();

            $newStartDate = clone($startDate->modify(sprintf("%s %s", $day, $hour)));
            $startDate->modify("+1 day");
            $occurence->setStartDate($newStartDate);
            $occurence->setDuration($event->getDuration());
            $occurence->setEvent($event);
            $this->getEntityManager()->persist($occurence);
            $this->getEntityManager()->flush();
            $occurence = null;
            next($days);
        }
    }

    private function insertSingleOccurence(Entity\Single $event) {
        $startDate = clone($event->getStartDate());
        $collection = new ArrayCollection();

        $occurence = new Entity\Singular();
        $occurence->setStartDate($startDate);
        $occurence->setDuration($event->getDuration());
        $occurence->setEvent($event);
        
        $collection->add($occurence);

        $event->setOccurences($collection);
    }

    private function setupDaysArrayToNearestDay(\DateTime $startDate, array &$days) {
        $currentDayNumber = (int) $startDate->format("N");

        while (current($days)) {
            $weekdayNumber = key($days);
            if ($weekdayNumber >= $currentDayNumber)
            {
                break;
            }
            next($days);
        }
    }

    private function getDays(Entity\Weekly $event) {
        $days = [];

        foreach ($this->weekdays as $i => $day) {
            $method = "get" . ucfirst($day);

            if (!method_exists($event, $method))
            {
                throw new Exception("Event has no $method() method!");
            }

            if (is_null($event->$method()) || $event->$method() === false)
            {
                continue;
            }

            $days[$i] = $day;
        }

        return $days;
    }

    /**
     * 
     * @param array
     * @return array
     */
    public function prepareOccurences(array $events = array()) {
        $eventsArray = [];
        $countColors = count($this->colors);

        foreach ($events as $i => $event) {
            $occurences = $event->getOccurences();
            foreach ($occurences as $j => $occurence) {
                $description = sprintf("%s \n(%s)", $event->getActivity()->getName(), $occurence->getDescription());
                $duration = new \DateInterval(sprintf("PT%dM", $occurence->getDuration()));

                $eventObject = [
                    "id"           => $occurence->getId(),
                    "title"        => $description,
                    "allDay"       => false,
                    "start"        => $occurence->getStartDate()->getTimestamp(),
                    "end"          => $occurence->getStartDate()->add($duration),
                    "color"        => $this->colors[$i % $countColors],
                    "textColor"    => "#000000",
                    "type"         => $event->getType(),
                    "occurence_id" => $occurence->getId(),
                    "url"          => $this->getRouter()->generate("_events_edit", ["occurence" => $occurence->getId()])
                ];

                array_push($eventsArray, $eventObject);
            }
        }

        return $eventsArray;
    }

}
