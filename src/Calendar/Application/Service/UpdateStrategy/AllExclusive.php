<?php
namespace Gyman\Calendar\Application\Service\UpdateStrategy;

use Gyman\Calendar\Application\Command\RemoveEventCommand;
use Gyman\Calendar\Application\Command\UpdateEventCommand;
use Gyman\Calendar\Application\Command\UpdateOccurrenceCommand;
use Gyman\Calendar\Application\Command\UpdateEventCommandInterface;
use Gyman\Calendar\Domain\Calendar\Event;
use Gyman\Calendar\Domain\Calendar\Event\Duration;
use Gyman\Calendar\Domain\Calendar\Event\EventType;
use Gyman\Calendar\Domain\Calendar\Event\Repetitions;
use Gyman\Calendar\Domain\Repository\EventRepositoryInterface;
use Gyman\Calendar\Domain\Repository\OccurrenceRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

final class AllExclusive implements UpdateStrategyInterface
{
    use SetRepositoriesTrait, SetFactoriesTrait;

    public function update(UpdateOccurrenceCommand $command)
    {
//        $occurrence = $command->occurrenceId();
//
//        /** @var Event $event */
//        $event = $occurrence->event();
//
//        if ($event->isType(EventType::TYPE_SINGLE)) {
//            throw new \Exception('Implement this!');
//        }
//        if ($event->isType(EventType::TYPE_WEEKLY)) {
//            $event->changeStartDate($command->startDate());
//            $event->changeEndDate($command->endDate());
//            $event->changeDuration(new Duration($command->duration()));
//            $event->changeTitle($command->title);
//            $event->changeRepetitions(new Repetitions($command->repetitions));
//
//            foreach ($event->occurrences() as $occurrence) {
//                if ($occurrence->isModified()) {
//                    continue;
//                }
//
//                $event->occurrences()->removeElement($occurrence);
//            }
//        }
//
//        $this->eventRepository->update($event);
    }

    public function setEventDispatcher(EventDispatcher $dispatcher)
    {
        // TODO: Implement setEventDispatcher() method.
    }

}
