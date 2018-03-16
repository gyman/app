<?php
namespace Gyman\Calendar\Application\Service;

use DateTime;
use Gyman\Calendar\Application\Command\UpdateOccurrenceCommand;
use Gyman\Calendar\Application\Event\PostUpdateEvent;
use Gyman\Calendar\Application\Repository\EventRepositoryInterface;
use Gyman\Calendar\Application\Repository\OccurrenceRepositoryInterface;
use Gyman\Calendar\Application\Service\UpdateStrategy\UpdateStrategyInterface;
use Exception;

/**
 * Class CreateEventHandler.
 */
final class OccurrenceUpdateManager
{
    const MODE_SINGLE         = 'single';
    const MODE_ALL_INCLUSIVE  = 'allinclusive';
    const MODE_ALL_EXCLUSIVE  = 'allexclusive';
    const MODE_NEXT_INCLUSIVE = 'nextinclusive';
    const MODE_NEXT_EXCLUSIVE = 'nextexclusive';
    const MODE_OVERWRITE      = 'overwrite';

    /**
     * @var array
     */
    public static $availableModes = [
        self::MODE_SINGLE,
//        self::MODE_ALL_INCLUSIVE,
//        self::MODE_ALL_EXCLUSIVE,
        self::MODE_NEXT_INCLUSIVE,
//        self::MODE_NEXT_EXCLUSIVE,
        self::MODE_OVERWRITE,
    ];

    /**
     * @var EventRepositoryInterface
     */
    private $eventRepository;

    /**
     * @var OccurrenceRepositoryInterface
     */
    private $occurrenceRepository;

    /**
     * @var UpdateStrategyInterface[]
     */
    private $strategy = [];

    /**
     * CreateEventHandler constructor.
     *
     * @param EventRepositoryInterface      $eventRepository
     * @param OccurrenceRepositoryInterface $occurrenceRepository
     */
    public function __construct(
        EventRepositoryInterface $eventRepository,
        OccurrenceRepositoryInterface $occurrenceRepository
    ) {
        $this->eventRepository      = $eventRepository;
        $this->occurrenceRepository = $occurrenceRepository;
    }

    public function addStrategy(string $name, UpdateStrategyInterface $strategy)
    {
        $strategy->setEventRepository($this->eventRepository);
        $strategy->setOccurrenceRepository($this->occurrenceRepository);

        $this->strategy[$name] = $strategy;
    }

    public function postEventUpdate(PostUpdateEvent $updateEvent)
    {

        if (!array_key_exists($updateEvent->getMethod(), $this->strategy)) {
            throw new Exception(sprintf(
                "Mode '%s' not allowed. Only %s allowed.",
                $updateEvent->getMethod(),
                implode(', ', array_keys($this->strategy))
            ));
        }

        $event = $updateEvent->getEvent();

        $this->strategy[$updateEvent->getMethod()]->update(new UpdateOccurrenceCommand(
            $updateEvent->getOccurrenceId(),
            $event->startDate(),
            $event->endDate(),
            $event->repetitions()
        ));
    }

    public function updateOccurrence(string $occurrenceId, DateTime $startDate, DateTime $endDate)
    {
        $this->strategy["single"]->update(new UpdateOccurrenceCommand(
           $occurrenceId,
           $startDate,
           $endDate
        ));
    }
}
