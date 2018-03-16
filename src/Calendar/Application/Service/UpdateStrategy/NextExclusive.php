<?php
namespace Gyman\Calendar\Application\Service\UpdateStrategy;

use Gyman\Calendar\Application\Command\UpdateOccurrenceCommand;
use Gyman\Calendar\Application\Command\UpdateEventCommandInterface;
use Exception;
use Symfony\Component\EventDispatcher\EventDispatcher;

class NextExclusive implements UpdateStrategyInterface
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
