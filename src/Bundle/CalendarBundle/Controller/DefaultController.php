<?php
namespace Gyman\Bundle\CalendarBundle\Controller;

use Carbon\Carbon;
use DateTime;
use Gyman\Calendar\Application\Command\CreateCalendarCommand;
use Gyman\Calendar\Application\Command\CreateEventCommand;
use Gyman\Calendar\Application\Command\RemoveEventCommand;
use Gyman\Calendar\Application\Command\UpdateOccurrenceCommand;
use Gyman\Calendar\Application\Service\OccurrenceUpdateManager;
use Gyman\Calendar\Domain\Calendar;
use Gyman\Calendar\Domain\Calendar\CalendarId;
use Gyman\Calendar\Domain\Calendar\Event\EventType;
use Gyman\Calendar\Domain\Calendar\Event\OccurrenceInterface;
use Gyman\Calendar\Domain\Calendar\Event\Repetitions;
use Gyman\Bundle\CalendarBundle\DTO\CreateFormData;
use Gyman\Bundle\CalendarBundle\DTO\RangeDatesFormData;
use Gyman\Bundle\CalendarBundle\DTO\UpdateFormData;
use Gyman\Bundle\CalendarBundle\Form\Type\CreateEventType;
use Gyman\Bundle\CalendarBundle\Form\Type\UpdateEventType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Ramsey\Uuid\Uuid;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController.
 */
class DefaultController extends Controller
{
    /**
     * @Template("DendeCalendarBundle:Default:index.html.twig")
     * @Route("/")
     *
     * @return array
     */
    public function indexAction()
    {
        $calendars = $this->get($this->getParameter('dende_calendar.calendar_repository_service_name'))->findAll();

        return [
            'calendars' => $calendars->map(function (Calendar $calendar) {
                return $calendar->id();
            }),
        ];
    }

    /**
     * @Route("/events", options={"expose"=true})
     * @Method({"GET"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getEventsAction(Request $request)
    {
        $start = Carbon::parse($request->get('start', 'this week'));
        $end = Carbon::parse($request->get('end', 'next week'));

        $events = $this->get('dende_calendar.occurrences_provider')->getAll($start, $end, !$request->get('noroute', false));

        return new JsonResponse($events);
    }

    /**
     * @Route("/occurrence/new", options={"expose"=true})
     * @Method({"GET", "POST"})
     * @Template("DendeCalendarBundle:Default:createEvent.html.twig")
     *
     * @return string
     */
    public function createEventAction(Request $request)
    {
        $response = new Response();

        $formData = new CreateFormData(
            $this->get('dende_calendar.calendar_repository')->findOneBy([]),
            EventType::single(),
            '',
            new RangeDatesFormData(
                Carbon::createFromFormat('YmdHi', $request->get('startDate', (new DateTime('now'))->format('YmdHi'))),
                Carbon::createFromFormat('YmdHi', $request->get('endDate', (new DateTime('+1 hour'))->format('YmdHi')))
            ),
            '',
            new Repetitions([
                Carbon::createFromFormat('YmdHi', $request->get('startDate', (new DateTime('now'))->format('YmdHi')))->format('N'),
            ])
        );

        $form = $this->createForm(CreateEventType::class, $formData, [
            'model_manager_name' => $this->getParameter('dende_calendar.model_manager_name'),
        ]);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                /** @var CreateFormData $formData */
                $formData = $form->getData();

                if ($formData->calendar() === null && $formData->newCalendarName() !== null) {
                    $calendarId = Uuid::uuid4();
                    $this->get('tactician.commandbus')->handle(new CreateCalendarCommand($calendarId, $formData->newCalendarName()));
                    $calendar = $this->get('dende_calendar.calendar_repository')->findOneByCalendarId($calendarId);
                    $formData->setCalendar($calendar);
                }

                $this->get('tactician.commandbus')->handle(new CreateEventCommand(
                    $formData->calendar()->id(),
                    $formData->type()->type(),
                    $formData->eventDates()->startDate(),
                    $formData->eventDates()->endDate(),
                    $formData->title(),
                    $formData->repetitions()->getArray()
                ));

                $this->addFlash('success', 'dende_calendar.flash.event_created_successfully');

                return $this->redirectToRoute('dende_calendar_default_index');
            } else {
                $this->addFlash('error', 'dende_calendar.flash.event_creation_error');
                $response->setStatusCode(400);
            }
        }

        return $this->render('DendeCalendarBundle:Default:createEvent.html.twig', [
            'form' => $form->createView(),
        ], $response);
    }

    /**
     * @Route("/occurrence/{occurrenceId}", options={"expose"=true})
     * @Method({"GET", "POST"})
     * @Template("DendeCalendarBundle:Default:updateEvent.html.twig")
     *
     * @param Request $request
     * @param string  $occurrenceId
     *
     * @throws EntityNotFoundException
     *
     * @return string
     */
    public function updateEventAction(Request $request, string $occurrenceId)
    {
        /** @var EntityManagerInterface $em */
        $em = $this->get('doctrine')->getManager($this->getParameter('dende_calendar.model_manager_name'));

        /** @var OccurrenceInterface $occurrence */
        $occurrence = $em->getRepository($this->getParameter('dende_calendar.occurrence.class'))->findOneBy(['occurrenceId.id' => $occurrenceId]);

        if (!$occurrence) {
            throw new EntityNotFoundException('Occurrence entity not found in database');
        }

        $response = new Response();

        if ($request->isMethod('GET')) {
            $event = $occurrence->event();

            $formData = new UpdateFormData(
                $occurrence,
                $event->title(),
                $event->startDate(),
                $event->endDate(),
                $occurrence->startDate(),
                $occurrence->endDate(),
                $event->repetitions(),
                OccurrenceUpdateManager::MODE_SINGLE
            );
        } elseif ($request->isMethod('POST')) {
            $request->attributes->add(['occurrence' => $occurrence]);
            $formData = UpdateFormData::fromRequest($request);
        }

        $form = $this->createForm(UpdateEventType::class, $formData);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                if ($form->get('delete_event')->isClicked()) {
                    $this->get('tactician.commandbus')->handle(new RemoveEventCommand($event->id()->id()));

                    return $this->redirectToRoute('dende_calendar_default_index');
                } elseif ($occurrence->event()->isWeekly() && $form->get('delete_occurrence')->isClicked()) {
                    $this->get('tactician.commandbus')->handle(new RemoveOccurrenceCommand($occurrenceId));

                    return $this->redirectToRoute('dende_calendar_default_index');
                } elseif ($occurrence->event()->isWeekly() && $formData->method() === 'single') {
                    $this->get('tactician.commandbus')->handle(new UpdateOccurrenceCommand(
                       $formData->occurrence()->id()->id(),
                       $formData->occurrenceDates()->startDate(),
                       $formData->occurrenceDates()->endDate(),
                       $formData->repetitions()->getArray()
                    ));
                } else {
                    $this->get('tactician.commandbus')->handle(new UpdateOccurrenceCommand(
                        $formData->occurrence()->id()->id(),
                        $formData->method(),
                        $formData->eventDates()->startDate(),
                        $formData->eventDates()->endDate(),
                        $formData->title(),
                        $formData->repetitions()->getArray()
                   ));

                    $this->addFlash('success', 'dende_calendar.flash.event_updated_successfully');

                    return $this->redirectToRoute('dende_calendar_default_index');
                }
            } else {
                $this->addFlash('error', 'dende_calendar.flash.event_update_error');
                $response->setStatusCode(Response::HTTP_BAD_REQUEST);
            }
        }

        return $this->render('DendeCalendarBundle:Default:updateEvent.html.twig', [
            'form' => $form->createView(),
        ], $response);
    }
}
