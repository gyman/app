<?php
namespace Gyman\Calendar\Application\Service\UpdateStrategy;

use Gyman\Calendar\Application\Command\UpdateOccurrenceCommand;
use Gyman\Calendar\Application\Service\UpdateStrategy\SetDispatcherTrait;
use Gyman\Calendar\Application\Service\UpdateStrategy\SetFactoriesTrait;
use Gyman\Calendar\Application\Service\UpdateStrategy\SetRepositoriesTrait;
use Gyman\Calendar\Application\Service\UpdateStrategy\UpdateStrategyInterface;
use Gyman\Calendar\Domain\Calendar\Event\Occurrence\OccurrenceData;
use Gyman\Calendar\Domain\Calendar\Event\Occurrence\OccurrenceDuration;

final class Single implements UpdateStrategyInterface
{
    use SetRepositoriesTrait, SetFactoriesTrait, SetDispatcherTrait;

    /**
     * @param UpdateOccurrenceCommand $command
     */
    public function update(UpdateOccurrenceCommand $command)
    {
        $occurrence = $this->occurrenceRepository->findOneById($command->occurrenceId());
        $occurrence->update(new OccurrenceData($command->startDate, OccurrenceDuration::calculate($command->startDate, $command->endDate)));
        $this->occurrenceRepository->update($occurrence);
    }
}
