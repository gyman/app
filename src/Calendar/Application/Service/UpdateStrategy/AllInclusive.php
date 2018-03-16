<?php
namespace Gyman\Calendar\Application\Service\UpdateStrategy;

use Exception;
use Gyman\Calendar\Application\Command\UpdateOccurrenceCommand;
use Gyman\Calendar\Application\Repository\EventRepositoryInterface;
use Gyman\Calendar\Application\Repository\OccurrenceRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class AllInclusive.
 *
 * @property OccurrenceRepositoryInterface occurrenceRepository
 * @property EventRepositoryInterface eventRepository
 */
final class AllInclusive implements UpdateStrategyInterface
{
    use SetRepositoriesTrait, SetFactoriesTrait;

    public function update(UpdateOccurrenceCommand $command)
    {
        throw new Exception('Implement me');
    }

    public function setEventDispatcher(EventDispatcher $dispatcher)
    {
        throw new Exception('Implement me');
    }
}
