<?php
namespace Dende\Calendar\Application\Handler\UpdateStrategy;

use Dende\Calendar\Application\Command\UpdateEventCommand;
use Dende\Calendar\Domain\Repository\EventRepositoryInterface;
use Dende\Calendar\Domain\Repository\OccurrenceRepositoryInterface;

/**
 * Interface UpdateStrategyInterface
 * @package Dende\Calendar\Application\Handler\UpdateStrategy
 */
interface UpdateStrategyInterface
{
    /**
     * @param UpdateEventCommand $command
     * @return null
     */
    public function update(UpdateEventCommand $command);

    public function setEventRepository(EventRepositoryInterface $eventRepository);

    public function setOccurrenceRepository(OccurrenceRepositoryInterface $occurrenceRepository);
}
