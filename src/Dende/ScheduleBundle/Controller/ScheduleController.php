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
        $currentYear = date("Y");
        $currentWeekNumber = date("W");

        $events = $this->get("event_repository")->getAllEvents();

        $eventsArray = array();

        foreach ($events as $event) {
            $weekdaynumber = date("N", strtotime("last " . $event->getDayOfWeek()));
            $startDateString = sprintf("%s-W%s-%s %s", $currentYear, $currentWeekNumber, $weekdaynumber, $event->getStartHour());
            $endDateString = sprintf("%s-W%s-%s %s", $currentYear, $currentWeekNumber, $weekdaynumber, $event->getEndHour());

            $eventObject = array(
                "id"     => $event->getId(),
                "title"  => $event->getActivity()->getName(),
                "allDay" => false,
                "start"  => strtotime($startDateString),
                "end"    => strtotime($endDateString),
            );

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
