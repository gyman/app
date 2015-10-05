<?php
namespace Gyman\Bundle\ScheduleBundle\Controller;

use Gyman\Bundle\ScheduleBundle\Entity as Event;
use Gyman\Bundle\ScheduleBundle\Form\EventType;
use Gyman\Bundle\ScheduleBundle\Form\OccurrenceType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/event")
 * @todo move as much code as possible to services
 */
class EventsController extends Controller
{
    /**
     * @Route("/year/{year}/week/{week}",name="_events_getWeek")
     * @Template()
     */
    public function getEventsForWeekAction($year, $week)
    {
        $serializer = $this->get('jms_serializer');
        $events = $this->get('event_repository')->getAllEventsForWeek($year, $week);
        $eventsArray = $this->get('occurrences_manager')->prepareOccurrences($events);

        return new Response($serializer->serialize($eventsArray, 'json'), 200, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/getDate/{date}",name="_events_getForDate")
     * @Template()
     */
    public function getEventsForDateAction(\DateTime $date)
    {
        $serializer = $this->get('jms_serializer');
        $eventsArray = $this->get('schedule')->getEventsForEntryEventSelector($date);

        return new Response($serializer->serialize($eventsArray, 'json'), 200, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/{occurrence}/drag",name="_events_drag")
     * @Security("has_role('ROLE_ADMIN')")
     * @ParamConverter("occurrence", class="ScheduleBundle:Occurrence")
     * Template()
     */
    public function dragEventAction(Event\Occurrence $occurrence, Request $request)
    {
        throw new \Exception('not working now');
        $delta = $request->get('delta');
        $days = intval($delta['days']);
        $minutes = intval($delta['minutes']) + $days * 24 * 60;

        $response = new Response('', 200);

        if ($minutes == 0) {
            $response->setStatusCode(500);
            $response->setContent($this->get('jms_serializer')->serialize(['status' => 'error', 'message' => 'time is 0'], 'json'));

            return $response;
        }

        $form = $this->createForm(new OccurrenceType(), $occurrence);

        return $response->setContent(
            $this->renderView(
                'ScheduleBundle:Events:drag.html.twig',
                [
                    'form'       => $form->createView(),
                    'occurrence' => $occurrence,
                ]
            )
        );
    }

    /**
     * @Route("/{occurrence}/resize",name="_events_resize")
     * @ParamConverter("occurrence", class="ScheduleBundle:Occurrence")
     * Template()
     */
    public function resizeEventAction(Event\Occurrence $occurrence, Request $request)
    {
        throw new \Exception('not working now');
        $duration = (int) $request->get('duration');

        if ($duration == 0) {
            return new Response();
        }

        $occurrence->setDuration($duration);

        $em = $this->getDoctrine()->getManager();

        $em->persist($occurrence);
        $em->flush();

        return new Response();
    }

    /**
     * @Route("/occurrence/{occurrence}/delete/serial",name="_events_delete_serial")
     * @ParamConverter("occurrence", class="ScheduleBundle:Occurrence")
     * Template()
     */
    public function deleteEventsAction(Event\Occurrence $occurrence)
    {
        $em = $this->getDoctrine()->getManager();
        $this->get('occurrence_repository')->deleteFollowing($occurrence);

        return new Response();
    }

    /**
     * @Route("/occurrence/{occurrence}/delete/singular",name="_events_delete_singular")
     * @ParamConverter("occurrence", class="ScheduleBundle:Occurrence")
     * Template()
     */
    public function deleteAction(Event\Occurrence $occurrence)
    {
        $event = $occurrence->getEvent();
        $em = $this->getDoctrine()->getManager();
        if ($occurrence instanceof Event\Singular) {
            $em->remove($occurrence);
        }
        if ($event instanceof Event\Single) {
            $em->remove($event);
        }
        $em->flush();

        return new Response();
    }

    /**
     * @Route("/new",name="_events_new")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_ADMIN')")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $response = new Response(
            'Content',
            200,
            ['content-type' => 'text/html']
        );

        $event = new Event\Event();

        $form = $this->createForm(new EventType(), $event);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $event = $this->get('event_repository')->createEntity($form);
                $this->setNewActivityToEvent($event, $form);
                $this->container->get('occurrences_manager')->addOccurrencesForEvent($event);
                $this->getDoctrine()->getManager()->persist($event);
            } else {
                $response->setStatusCode(400);
            }
        }

        $this->getDoctrine()->getManager()->flush();

        return $response->setContent(
            $this->renderView(
                'ScheduleBundle:Events:new.html.twig',
                [
                    'form'  => $form->createView(),
                    'event' => $event,
                ]
            )
        );
    }

    /**
     * @Route("/occurrence/{occurrence}/show",name="_events_show")
     * @ParamConverter("occurrence", class="ScheduleBundle:Occurrence")
     * @Template()
     */
    public function showAction(Event\Occurrence $occurrence)
    {
        $response = new Response();

        return $response->setContent(
            $this->renderView(
                'ScheduleBundle:Events:show.html.twig',
                [
                    'occurrence' => $occurrence,
                ]
            )
        );
    }

    /**
     * @Route("/occurrence/{occurrence}/edit",name="_events_edit")
     * @ParamConverter("occurrence", class="ScheduleBundle:Occurrence")
     * @Security("has_role('ROLE_USER')")
     * @Template()
     * @todo split to two separated actions
     */
    public function editAction(Event\Occurrence $occurrence, Request $request)
    {
        $response = new Response(
            'Content',
            200,
            ['content-type' => 'text/html']
        );

        $event = $occurrence->getEvent();

        if ($occurrence->isPast() || !$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            return $this->forward(
                'ScheduleBundle:Events:Show',
                [
                    'event'      => $event->getId(),
                    'occurrence' => $occurrence->getId(),
                ]
            );
        }

        $eventType = new EventType();
        $eventType->setOccurrence($occurrence);

        $form = $this->createForm($eventType, $event);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $this->setNewActivityToEvent($event, $form);

                if ($form->has('editType') && $form->get('editType')->getData() == Event\Occurrence::SERIAL) {
                    $this->container->get('occurrences_manager')->updateOccurrencesForEvent($event, $occurrence, $form);
                    $this->getDoctrine()->getManager()->persist($event);
                } elseif ($form->has('editType') && $form->get('editType')->getData() == Event\Occurrence::SINGULAR) {
                    $singularOccurrence = new Event\Singular();
                    $singularOccurrence->setStartDate($form->get('startDate')->getData());
                    $singularOccurrence->setDuration($form->get('duration')->getData());
                    $singularOccurrence->setDescription($form->get('description')->getData());
                    $singularOccurrence->setEvent($occurrence->getEvent());

                    $this->getDoctrine()->getManager()->remove($occurrence);
                    $this->getDoctrine()->getManager()->persist($singularOccurrence);
                } elseif (!$form->has('editType') && $occurrence instanceof Event\Singular) {
                    $occurrence->setStartDate($form->get('startDate')->getData());
                    $occurrence->setDuration($form->get('duration')->getData());
                    $occurrence->setDescription($form->get('description')->getData());
                    $this->getDoctrine()->getManager()->persist($occurrence);
                }
            } else {
                $response->setStatusCode(400);
            }
            $this->getDoctrine()->getManager()->flush();
        }

        return $response->setContent(
            $this->renderView(
                'ScheduleBundle:Events:edit.html.twig',
                [
                    'form'                 => $form->createView(),
                    'event'                => $event,
                    'occurrence'           => $occurrence,
                    'eventType'            => get_class($event),
                    'occurrenceType'       => get_class($occurrence),
                    'occurrenceSerialized' => $this->get('jms_serializer')->serialize($occurrence, 'json'),
                    'eventSerialized'      => $this->get('jms_serializer')->serialize($event, 'json'),
                ]
            )
        );
    }

    private function setNewActivityToEvent(Event\Event $event, $form)
    {
        if ($form->has('newActivity') && $newActivityName = $form->get('newActivity')->getData()) {
            /** @var $activity Event\Activity */
            if ($activity = $this->get('activity_repository')->findOneByName($newActivityName)) {;
            } else {
                $activity = new Event\Activity();
                $activity->setName($newActivityName);
            }

            $event->setActivity($activity);
        }
    }
}
