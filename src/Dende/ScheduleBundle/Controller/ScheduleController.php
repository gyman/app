<?php

namespace Dende\ScheduleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class ScheduleController extends Controller {

    /**
     * @Route("/schedule",name="_schedule_calendar")
     * @Template()
     */
    public function indexAction() {
        $serializer = $this->get("jms_serializer");
        $currentYear = date("Y");
        $currentWeekNumber = date("W");

        $events = $this->get("event_repository")->getAllEventsForWeek($currentYear, $currentWeekNumber);

        $eventsArray = [];

        $colors = ["#ddffff", "#ffddff", "#ffffdd", "#ddffdd", "#ffdddd"];

        foreach ($events as $i => $event) {
            $description = "";

            if ($event instanceof \Dende\ScheduleBundle\Entity\RecurringEvent)
            {
                $startDate = $event->getOccurenceForWeekNumber($currentYear, $currentWeekNumber);
            }
            else
            {
                $startDate = $event->getStartDate();
                $description = sprintf(" (%s)", $event->getDescription());
            }

            $eventObject = [
                "id"        => $event->getId(),
                "title"     => $event->getActivity()->getName() . $description,
                "allDay"    => false,
                "start"     => $startDate->getTimestamp(),
                "end"       => $startDate->getTimestamp() + $event->getDuration(),
                "color"     => $colors[$i % 5],
                "textColor" => "#000000"
            ];

            array_push($eventsArray, $eventObject);
        }

        $eventsJson = json_encode($eventsArray);

        return array("eventJson" => $eventsJson);
    }

    /**
     * @Route("/events/{date}",name="_schedule_getEventsForDate")
     * @ParamConverter("date", options={"format": "Y-m-d H:i"})
     * Template()
     */
    public function getEventsForDateAction(\DateTime $date) {
        $serializer = $this->get("jms_serializer");
        $eventRepository = $this->get("event_repository");

        $events = $eventRepository->getEventsForDateArray($date);
        return new Response($serializer->serialize($events, "json"));
    }

}
