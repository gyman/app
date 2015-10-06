<?php
namespace Dende\Calendar\Application\Handler;

use Dende\Calendar\Application\Command\CreateEventCommand;
use Dende\Calendar\Application\Factory\EventFactory;
use Dende\Calendar\Application\Factory\OccurrenceFactory;
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
     * @var EventRepositoryInterface
     */
    private $eventRepository;

    /**
     * @var OccurrenceRepositoryInterface
     */
    private $occurrenceRepository;

    /**
     * CreateEventHandler constructor.
     * @param EventRepositoryInterface $eventRepository
     */
    public function __construct(EventRepositoryInterface $eventRepository, OccurrenceRepositoryInterface $occurrenceRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->occurrenceRepository = $occurrenceRepository;
    }

    /**
     * @param CreateEventCommand $command
     */
    public function handle(CreateEventCommand $command)
    {
        $event = EventFactory::createFromCommand($command);

        $this->eventRepository->insert($event);

        $occurrences = OccurrenceFactory::generateCollectionFromEvent($event);

        foreach($occurrences as $occurrence) {
            $this->occurrenceRepository->insert($occurrence);
        }
    }
}
