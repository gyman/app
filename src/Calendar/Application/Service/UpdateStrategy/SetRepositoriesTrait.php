<?php
namespace Gyman\Calendar\Application\Service\UpdateStrategy;

use Gyman\Calendar\Application\Repository\EventRepositoryInterface;
use Gyman\Calendar\Application\Repository\OccurrenceRepositoryInterface;

/**
 * Class SetRepositoriesTrait.
 */
trait SetRepositoriesTrait
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
     * @param EventRepositoryInterface $eventRepository
     */
    public function setEventRepository(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * @param OccurrenceRepositoryInterface $occurrenceRepository
     */
    public function setOccurrenceRepository(OccurrenceRepositoryInterface $occurrenceRepository)
    {
        $this->occurrenceRepository = $occurrenceRepository;
    }
}
