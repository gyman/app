<?php
namespace Gyman\Calendar\Application\Handler;

use Carbon\Carbon;
use Gyman\Calendar\Application\Command\CreateEventCommand;
use Gyman\Calendar\Application\Repository\CalendarRepositoryInterface;
use Gyman\Calendar\Application\Repository\EventRepositoryInterface;
use Gyman\Calendar\Application\Repository\OccurrenceRepositoryInterface;
use Gyman\Calendar\Domain\Calendar;
//use Gyman\Calendar\Domain\Calendar\Event;
use Gyman\Domain\Calendar\Event;
use Gyman\Calendar\Domain\Calendar\Event\Duration;
use Gyman\Calendar\Domain\Calendar\Event\EventId;
use Gyman\Calendar\Domain\Calendar\Event\EventType;
use Gyman\Calendar\Domain\Calendar\Event\Repetitions;
use Exception;
use Ramsey\Uuid\Uuid;

/**
 * Class CreateEventHandler.
 */
final class CreateEventHandler
{
    /**
     * @var EventRepositoryInterface
     */
    private $eventRepository;

    /**
     * @var OccurrenceRepositoryInterface
     */
    private $occurrenceRepository;

    /**
     * @var CalendarRepositoryInterface
     */
    private $calendarRepository;

    public function __construct(CalendarRepositoryInterface $calendarRepository, EventRepositoryInterface $eventRepository, OccurrenceRepositoryInterface $occurrenceRepository)
    {
        $this->calendarRepository   = $calendarRepository;
        $this->eventRepository      = $eventRepository;
        $this->occurrenceRepository = $occurrenceRepository;
    }

    public function handle(CreateEventCommand $command) : void
    {
        if ($command->type() === EventType::TYPE_SINGLE) {
            $endDate = Carbon::instance($command->startDate())
                ->addMinutes(Duration::calculate($command->startDate(), $command->endDate())->minutes());

            $repetitions = [];
        } else {
            $endDate = Carbon::instance($command->endDate());

            if (0 === count($command->repetitions())) {
                throw new Exception('If event is repetive, you should choose days of repetition for it!');
            }

            $repetitions = $command->repetitions();
        }

        /** @var Calendar $calendar */
        $calendar = $this->calendarRepository->findOneByCalendarId($command->calendarId());

        if (null === $calendar) {
            throw new Exception('Calendar is null and it has to be set!');
        }

        Event::setOccurrenceClass(Event\Occurrence::class);
        
        $event = Event::create(
            Uuid::uuid4(),
            $command->title(),
            $command->startDate(),
            $endDate,
            new EventType($command->type()),
            new Repetitions($repetitions),
            $calendar
        );

        $calendar->addEvent($event);

        foreach ($event->occurrences() as $occurrence) {
            $this->occurrenceRepository->insert($occurrence);
        }

        $this->eventRepository->insert($event);
    }
}
