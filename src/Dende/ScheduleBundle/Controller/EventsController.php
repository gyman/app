<?php

namespace Dende\ScheduleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Dende\ScheduleBundle\Entity as Event;

/**
 * @Route("/schedule",name="_events_getWeek")
 */
class EventsController extends Controller {

    /**
     * @Route("/events/year/{year}/week/{week}",name="_events_getWeek")
     * @Template()
     */
    public function getEventsForWeekAction($year, $week) {
        $serializer = $this->get("jms_serializer");
        $events = $this->get("event_repository")->getAllEventsForWeek($year, $week);
        $eventsArray = $this->prepareEvents($events, $year, $week);

        return new Response($serializer->serialize($eventsArray, "json"), 200, ["Content-Type" => "application/json"]);
    }

    private function prepareEvents($events, $year, $week) {
        $eventsArray = [];

        $colors = [
            "#CC3366", "#D8648B", "#64D8B1", "#33CC99",
            "#CC33B3", "#9933CC", "#4D33CC", "#CC4D33",
            "#E495AF", "#3366CC", "#33B3CC", "#66CC33",
        ];

        $countColors = count($colors);

        foreach ($events as $i => $event) {
            if ($event instanceof \Dende\ScheduleBundle\Entity\RecurringEvent)
            {
                $startDate = $event->getOccurenceForWeekNumber($year, $week);
                $description = sprintf("» %s", $event->getActivity()->getName());
            }
            else
            {
                $startDate = $event->getStartDate();
                $description = $event->getDescription() ? sprintf("%s \n(%s)", $event->getActivity()->getName(), $event->getDescription())
                            : $event->getActivity()->getName();
            }

            $eventObject = [
                "id"        => $event->getId(),
                "title"     => $description,
                "allDay"    => false,
                "start"     => $startDate->getTimestamp(),
                "end"       => $startDate->getTimestamp() + $event->getDuration(),
                "color"     => $colors[$i % $countColors],
                "textColor" => "#000000",
                "type"      => $event->getType(),
                "url"       => $this->generateUrl("_events_edit", ["event" => $event->getId(), "date" => $startDate->format("Y-m-d H:i")])
            ];

            array_push($eventsArray, $eventObject);
        }

        return $eventsArray;
    }

    /**
     * @Route("/events/{event}/drag",name="_events_drag")
     * @ParamConverter("event", class="ScheduleBundle:Event")
     * Template()
     */
    public function dragEventAction(Event\Event $event, Request $request) {
        $delta = $request->get("delta");
        $days = intval($delta["days"]);
        $minutes = intval($delta["minutes"]) + $days * 24 * 60;

        if ($minutes == 0)
        {
            return new Response();
        }

        $em = $this->getDoctrine()->getManager();

        $diff = new \DateInterval(sprintf("PT%dM", abs($minutes)));
        $diff->invert = $minutes < 0;

        $event->setStartDate(
                clone($event->getStartDate()->add($diff))
        );

        foreach ($event->getMeta() as $eventMeta) {
            $eventMeta->setStartDate(
                    clone($eventMeta->getStartDate()->add($diff))
            );
            $em->persist($eventMeta);
        }

        $em->persist($event);
        $em->flush();

        return new Response();
    }

    /**
     * @Route("/events/{event}/resize",name="_events_resize")
     * @ParamConverter("event", class="ScheduleBundle:Event")
     * Template()
     */
    public function resizeEventAction(Event\Event $event, Request $request) {
        $duration = (int) $request->get("duration");

        if ($duration == 0)
        {
            return new Response();
        }

        $event->setDuration($duration);

        $em = $this->getDoctrine()->getManager();

        $em->persist($event);
        $em->flush();

        return new Response();
    }

    /**
     * @Route("/events/{event}/delete",name="_events_delete")
     * @ParamConverter("event", class="ScheduleBundle:Event")
     * Template()
     */
    public function deleteEventAction(Event\Event $event, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();
        return new Response();
    }

    /**
     * @Route("/events/{event}/delete",name="_events_delete_one")
     * @ParamConverter("event", class="ScheduleBundle:Event")
     * Template()
     */
    public function deleteOneEventAction(Event\Event $event, Request $request) {
        // gets Date when should be removed and adds it to exclusion_list
        $em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();
        return new Response();
    }

    /**
     * @Route("/events/{event}/date/{date}/edit",name="_events_edit")
     * @ParamConverter("event", class="ScheduleBundle:Event")
     * @Template()
     */
    public function editEventAction(Event\Event $event, \DateTime $date, Request $request) {
        return array("event" => $event, "date" => $date);
    }

}
