<?php

namespace Dende\ScheduleBundle\Services;

use Dende\ScheduleBundle\Entity as Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Dende\ScheduleBundle\Services\OccurencesManager;
use Symfony\Component\Form\Form;

class OccurencesManager {
// <editor-fold defaultstate="collapsed" desc="members">

    /**
     *
     * @var Form 
     */
    private $form;

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

    /**
     *
     * @var Entity\Occurence 
     */
    private $occurence;

// <editor-fold defaultstate="collapsed" desc="setters and getters">

    /**
     * 
     * @return Entity\Occurence
     */
    public function getOccurence() {
        return $this->occurence;
    }

    /**
     * 
     * @param \Dende\ScheduleBundle\Entity\Occurence $occurence
     * @return \Dende\ScheduleBundle\Services\OccurencesManager
     */
    public function setOccurence(Entity\Occurence $occurence) {
        $this->occurence = $occurence;
        return $this;
    }

    public function getForm() {
        return $this->form;
    }

    /**
     * 
     * @param \Symfony\Component\Form\Form $form
     * @return \Dende\ScheduleBundle\Services\OccurencesManager
     */
    public function setForm(Form $form) {
        $this->form = $form;
        return $this;
    }

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

    public function updateOccurencesForEvent(Entity\Event $event, Entity\Occurence $editedOccurence, Form $form) {
        $this->setForm($form);

        if ($editedOccurence->isPast())
        {
            throw new \Exception("Cannot edit past occurences");
        }

        $this->setOccurence($editedOccurence);

        $startDate = $editedOccurence->getStartDate();

        $qb = $this->getEntityManager()->createQueryBuilder();

        $qb->delete()
            ->from("ScheduleBundle:Occurence", "o")
            ->where("o.event = :event")
            ->andWhere("o.startDate >= :start")
            ->setParameters([
                "event" => $event,
                "start" => $startDate
        ]);

        $qb->getQuery()->execute();

        if ($event instanceof Entity\Single)
        {
            $this->insertSingleOccurence($event);
        }
        else if ($event instanceof Entity\Weekly)
        {
            $this->insertWeeklyOccurences($event);
        }
    }

    private function insertWeeklyOccurences(Entity\Weekly $event) {
        $days = $this->getDays($event);

        if ($occurence = $this->getOccurence())
        {
            $startDate = clone($occurence->getStartDate());
        }
        else
        {
            $startDate = clone($event->getStartDate());
        }

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

        if ($form = $this->getForm())
        {
            $occurence->setDescription($form->get("description")->getData());
        }

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

        if ($form = $this->getForm())
        {
            return $form["days"]->getData();
        }

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
                $description = sprintf("%s", $event->getActivity()->getName());
                $duration = new \DateInterval(sprintf("PT%dM", $occurence->getDuration()));

                $eventObject = [
                    "id"           => $occurence->getEvent()->getId(),
                    "title"        => $description,
                    "allDay"       => false,
                    "start"        => $occurence->getStartDate()->getTimestamp(),
                    "end"          => $occurence->getStartDate()->add($duration),
                    "color"        => $this->colors[$i % $countColors],
                    "textColor"    => "#000000",
                    "type"         => $event->getType(),
                    "occurence_id" => $occurence->getId(),
//                    "url"          => $this->getRouter()->generate("_events_edit", ["occurence" => $occurence->getId()])
                ];

                array_push($eventsArray, $eventObject);
            }
        }

        return $eventsArray;
    }

}
