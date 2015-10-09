<?php
namespace Dende\Calendar\Application\Handler\UpdateStrategy;

use Dende\Calendar\Application\Command\UpdateEventCommand;

/**
 * Class Single
 * @package Dende\Calendar\Application\Handler\UpdateStrategy
 */
final class Single implements UpdateStrategyInterface
{
    use SetRepositoriesTrait;

    /**
     * @param UpdateEventCommand $command
     * @return null
     */
    public function update(UpdateEventCommand $command)
    {
        // TODO: Implement update() method.
    }
}
