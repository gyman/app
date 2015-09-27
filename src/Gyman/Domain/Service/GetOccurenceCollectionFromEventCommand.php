<?php
namespace Gyman\Domain\Service;

use DateInterval;
use DatePeriod;
use Doctrine\Common\Collections\ArrayCollection;
use Generator;
use Gyman\Domain\Command\CreateEventCommand;
use Gyman\Domain\Factory\OccurenceFactory;
use Gyman\Domain\Model\Duration;
use Gyman\Domain\Model\Occurence;

/**
 * Class GetOccurenceCollectionFromEventCommand
 * @package Gyman\Domain\Service
 */
final class GetOccurenceCollectionFromEventCommand
{
    /**
     * @param CreateEventCommand $command
     * @return Generator|Occurence[]|ArrayCollection
     */
    public function produce(CreateEventCommand $command)
    {
        $interval = new DateInterval('P1D');
        $period = new DatePeriod($command->startDate, $interval, $command->endDate);

        foreach($period as $date) {
            if(in_array($date->format('N'), $command->repetitionDays)) {
                yield OccurenceFactory::createFromArray([
                    "startDate" => $date,
                    "duration" => new Duration($command->duration)
                ]);
            }
        }
    }
}