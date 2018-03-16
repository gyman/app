<?php
namespace Gyman\Calendar\Application\Service\UpdateStrategy;

use Gyman\Calendar\Application\Command\RemoveEventCommand;
use Gyman\Calendar\Application\Command\UpdateOccurrenceCommand;
use Gyman\Calendar\Application\Command\UpdateEventCommandInterface;
use Gyman\Calendar\Application\Repository\EventRepositoryInterface;
use Gyman\Calendar\Application\Repository\OccurrenceRepositoryInterface;
use Exception;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class AllInclusive.
 *
 * @property OccurrenceRepositoryInterface occurrenceRepository
 * @property EventRepositoryInterface eventRepository
 */
final class Overwrite implements UpdateStrategyInterface
{
    use SetRepositoriesTrait, SetFactoriesTrait;

    /**
     * @param UpdateEventCommandInterface|UpdateOccurrenceCommand|RemoveEventCommand $command
     */
    public function update(UpdateOccurrenceCommand $command)
    {
        throw new Exception('Implement me');
    }

    public function setEventDispatcher(EventDispatcher $dispatcher)
    {
        // TODO: Implement setEventDispatcher() method.
    }
}
