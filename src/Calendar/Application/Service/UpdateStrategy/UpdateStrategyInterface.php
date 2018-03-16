<?php
namespace Gyman\Calendar\Application\Service\UpdateStrategy;

use Gyman\Calendar\Application\Command\UpdateOccurrenceCommand;
use Gyman\Calendar\Application\Factory\EventFactory;
use Gyman\Calendar\Application\Factory\EventFactoryInterface;
use Gyman\Calendar\Application\Factory\OccurrenceFactory;
use Gyman\Calendar\Application\Factory\OccurrenceFactoryInterface;
use Gyman\Calendar\Application\Repository\EventRepositoryInterface;
use Gyman\Calendar\Application\Repository\OccurrenceRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Interface UpdateStrategyInterface.
 */
interface UpdateStrategyInterface
{
    /**
     * @param UpdateOccurrenceCommand $command
     */
    public function update(UpdateOccurrenceCommand $command);

    /**
     * @param EventRepositoryInterface $eventRepository
     */
    public function setEventRepository(EventRepositoryInterface $eventRepository);

    /**
     * @param OccurrenceRepositoryInterface $occurrenceRepository
     */
    public function setOccurrenceRepository(OccurrenceRepositoryInterface $occurrenceRepository);

    /**
     * @param EventFactory $eventFactory
     */
    public function setEventFactory(EventFactoryInterface $eventFactory);

    /**
     * @param OccurrenceFactory $occurrenceFactory
     */
    public function setOccurrenceFactory(OccurrenceFactoryInterface $occurrenceFactory);

    /**
     * @param EventDispatcher $dispatcher
     */
    public function setEventDispatcher(EventDispatcher $dispatcher);
}
