<?php
namespace Gyman\Calendar\Application\Handler;

use Gyman\Calendar\Application\Command\UpdateOccurrenceCommand;
use Gyman\Calendar\Application\Service\OccurrenceUpdateManager;

class UpdateOccurrenceHandler
{

    /** @var OccurrenceUpdateManager */
    private $manager;

    /**
     * UpdateOccurrenceHandler constructor.
     * @param OccurrenceUpdateManager $manager
     */
    public function __construct(OccurrenceUpdateManager $manager)
    {
        $this->manager = $manager;
    }

    public function handle(UpdateOccurrenceCommand $command)
    {
        $this->manager->updateOccurrence($command->occurrenceId, $command->startDate, $command->endDate);
    }
}
