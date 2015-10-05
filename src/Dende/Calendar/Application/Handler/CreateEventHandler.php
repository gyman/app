<?php
namespace Dende\Calendar\Handler;

use Dende\Calendar\Application\Command\CreateEventCommand;
use Dende\Calendar\Application\Factory\EventFactory;
use Dende\Calendar\Domain\Calendar;
use Dende\Calendar\Domain\Repository\EventRepositoryInterface;
use Dende\Calendar\Domain\Repository\OccurrenceRepositoryInterface;

/**
 * Class CreateEventHandler
 * @package Gyman\Domain\Handler
 */
final class CreateEventHandler
{
    /**
     * @var Calendar
     */
    private $calendar;

    /**
     * @var EventRepositoryInterface
     */
    private $eventRepository;

    /**
     * @var OccurrenceRepositoryInterface
     */
    private $occurrenceRepository;

    /**
     * CreateEventHandler constructor.
     * @param Calendar $calendar
     * @param EventRepositoryInterface $eventRepository
     */
    public function __construct(Calendar $calendar, EventRepositoryInterface $eventRepository, OccurrenceRepositoryInterface $occurrenceRepository)
    {
        $this->calendar = $calendar;
        $this->eventRepository = $eventRepository;
        $this->occurrenceRepository = $occurrenceRepository;
    }

    /**
     * @param CreateEventCommand $command
     */
    public function handle(CreateEventCommand $command)
    {
        $event = EventFactory::createFromCommand($command);
        $event->resetAllOccurrences();
        $this->eventRepository->insert($event);
    }
}
