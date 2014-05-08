<?php

namespace Dende\ScheduleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Dende\ScheduleBundle\Entity as Event;
use Dende\ScheduleBundle\Form\EventType;
use Dende\ScheduleBundle\Form\OccurenceType;

/**
 * @Route("/event")
 */
class EventsController extends Controller {

    /**
     * @Route("/year/{year}/week/{week}",name="_events_getWeek")
     * @Template()
     */
    public function getEventsForWeekAction($year, $week) {
        $serializer = $this->get("jms_serializer");
        $events = $this->get("event_repository")->getAllEventsForWeek($year, $week);
        $eventsArray = $this->get('occurences_manager')->prepareOccurences($events);

        return new Response($serializer->serialize($eventsArray, "json"), 200, ["Content-Type" => "application/json"]);
    }

    /**
     * @Route("/getDate/{date}",name="_events_getForDate")
     * @Template()
     */
    public function getEventsForDateAction(\DateTime $date) {
        $serializer = $this->get("jms_serializer");
        $eventsArray = $this->get('schedule')->getEventsForEntryEventSelector($date);

        return new Response($serializer->serialize($eventsArray, "json"), 200, ["Content-Type" => "application/json"]);
    }

    /**
     * @Route("/{occurence}/drag",name="_events_drag")
     * @ParamConverter("occurence", class="ScheduleBundle:Occurence")
     * Template()
     */
    public function dragEventAction(Event\Occurence $occurence, Request $request) {
        throw new \Exception("not working now");
        $delta = $request->get("delta");
        $days = intval($delta["days"]);
        $minutes = intval($delta["minutes"]) + $days * 24 * 60;

        $response = new Response('', 200);

        if ($minutes == 0)
        {
            $response->setStatusCode(500);
            $response->setContent($this->get("jms_serializer")->serialize(["status" => "error", "message" => "time is 0"], "json"));
            return $response;
        }

        $form = $this->createForm(new OccurenceType(), $occurence);

//        if ($request->getMethod() == 'POST')
//        {
//            $form->handleRequest($request);
//
//            if ($form->isValid())
//            {
//                
//            }
//            else
//            {
//                $response->setStatusCode(400);
//            }
//        }
//        $em = $this->getDoctrine()->getManager();
//
//        $diff = new \DateInterval(sprintf("PT%dM", abs($minutes)));
//        $diff->invert = $minutes < 0;
//
//        $occurence->setStartDate(
//                clone($occurence->getStartDate()->add($diff))
//        );
//
//        foreach ($occurence->getMeta() as $eventMeta) {
//            $eventMeta->setStartDate(
//                    clone($eventMeta->getStartDate()->add($diff))
//            );
//            $em->persist($eventMeta);
//        }
//
//        $em->persist($occurence);
//        $em->flush();

        return $response->setContent(
                        $this->renderView("ScheduleBundle:Events:drag.html.twig", array(
                            "form"      => $form->createView(),
                            "occurence" => $occurence
                                )
                        )
        );
    }

    /**
     * @Route("/{occurence}/resize",name="_events_resize")
     * @ParamConverter("occurence", class="ScheduleBundle:Occurence")
     * Template()
     */
    public function resizeEventAction(Event\Occurence $occurence, Request $request) {
        throw new \Exception("not working now");
        $duration = (int) $request->get("duration");

        if ($duration == 0)
        {
            return new Response();
        }

        $occurence->setDuration($duration);

        $em = $this->getDoctrine()->getManager();

        $em->persist($occurence);
        $em->flush();

        return new Response();
    }

    /**
     * @Route("/occurence/{occurence}/delete",name="_events_delete")
     * @ParamConverter("occurence", class="ScheduleBundle:Occurence")
     * Template()
     */
    public function deleteEventAction(Event\Occurence $occurence) {
        throw new Exception("finish this!");
        die(var_dump($occurence));
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($occurence);
        $em->flush();
        return new Response();
    }

    /**
     * @Route("/new",name="_events_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request) {
        $response = new Response(
                'Content', 200, array('content-type' => 'text/html')
        );

        $event = new Event\Event();

        $form = $this->createForm(new EventType(), $event);

        if ($request->getMethod() == 'POST')
        {
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $event = $this->get("event_repository")->createEntity($form);
                $this->setNewActivityToEvent($event, $form);
                $this->container->get('occurences_manager')->addOccurencesForEvent($event);
                $this->getDoctrine()->getManager()->persist($event);
            }
            else
            {
                $response->setStatusCode(400);
            }
        }

        $this->getDoctrine()->getManager()->flush();

        return $response->setContent(
                        $this->renderView("ScheduleBundle:Events:new.html.twig", array(
                            'form'  => $form->createView(),
                            'event' => $event,
                                )
                        )
        );
    }

    /**
     * @Route("/occurence/{occurence}/show",name="_events_show")
     * @ParamConverter("occurence", class="ScheduleBundle:Occurence")
     * @Template()
     */
    public function showAction(Event\Occurence $occurence) {
        $response = new Response;

        return $response->setContent(
                        $this->renderView("ScheduleBundle:Events:show.html.twig", array(
                            'occurence' => $occurence,
                                )
                        )
        );
    }

    /**
     * @Route("/{event}/occurence/{occurence}/edit",name="_events_edit")
     * @ParamConverter("occurence", class="ScheduleBundle:Occurence")
     * @ParamConverter("event", class="ScheduleBundle:Event")
     * @Template()
     */
    public function editAction(Event\Event $event, Event\Occurence $occurence, Request $request) {
        $response = new Response(
                'Content', 200, array('content-type' => 'text/html')
        );

        if ($occurence->isPast())
        {
            return $this->forward("ScheduleBundle:Events:Show", [
                        "event"     => $event->getId(),
                        "occurence" => $occurence->getId()
            ]);
        }

        $eventType = new EventType();
        $eventType->setOccurence($occurence);

        $form = $this->createForm($eventType, $event);

        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $this->setNewActivityToEvent($event, $form);

                if ($form->has("editType") && $form->get("editType")->getData() == Event\Occurence::SERIAL)
                {
                    $this->container->get('occurences_manager')->updateOccurencesForEvent($event, $occurence, $form);
                    $this->getDoctrine()->getManager()->persist($event);
                }
                else if ($form->has("editType") && $form->get("editType")->getData() == Event\Occurence::SINGULAR)
                {
                    $occurence->setStartDate($form->get("startDate")->getData());
                    $occurence->setDuration($form->get("duration")->getData());
                    $occurence->setDescription($form->get("description")->getData());
                    $this->getDoctrine()->getManager()->persist($occurence);
                }
            }
            else
            {
                $response->setStatusCode(400);
            }
            $this->getDoctrine()->getManager()->flush();
        }


        return $response->setContent(
                        $this->renderView("ScheduleBundle:Events:edit.html.twig", array(
                            'form'                => $form->createView(),
                            'event'               => $event,
                            'occurence'           => $occurence,
                            'eventType'           => get_class($event),
                            'occurenceType'       => get_class($occurence),
                            "occurenceSerialized" => $this->get("jms_serializer")->serialize($occurence, "json"),
                            "eventSerialized"     => $this->get("jms_serializer")->serialize($event, "json")
                                )
                        )
        );
    }

    private function setNewActivityToEvent(Event\Event $event, $form) {
        if ($form->has("newActivity") && $newActivityName = $form->get("newActivity")->getData())
        {
            /** @var $activity Event\Activity */
            if ($activity = $this->get("activity_repository")->findOneByName($newActivityName))
            {
                ;
            }
            else
            {
                $activity = new Event\Activity();
                $activity->setName($newActivityName);
            }

            $event->setActivity($activity);
        }
    }

}
