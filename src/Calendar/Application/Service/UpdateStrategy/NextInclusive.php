<?php
namespace Gyman\Calendar\Application\Service\UpdateStrategy;

use Gyman\Calendar\Application\Command\RemoveEventCommand;
use Gyman\Calendar\Application\Command\UpdateOccurrenceCommand;
use Gyman\Calendar\Application\Command\UpdateEventCommandInterface;
use Gyman\Calendar\Domain\Calendar\Event\EventId;
use Gyman\Calendar\Domain\Calendar\Event\Repetitions;
use Exception;
use Ramsey\Uuid\Uuid;
use Symfony\Component\EventDispatcher\EventDispatcher;

class NextInclusive implements UpdateStrategyInterface
{
    use SetRepositoriesTrait, SetFactoriesTrait;

    public function update(UpdateOccurrenceCommand $command)
    {
        $occurrence    = $this->occurrenceRepository->findOneById($command->occurrenceId());
        $originalEvent = $this->eventRepository->findOneByOccurrence($occurrence);

        if ($originalEvent->isSingle()) {
            throw new Exception('This strategy is for series types events!');
        }

        $pivotDate = $originalEvent->findPivotDate($occurrence);
        $originalEvent->closeAtDate($pivotDate);

        if ($command instanceof UpdateOccurrenceCommand) {
            $calendar = $originalEvent->calendar();
            $eventId  = Uuid::uuid4();
            $calendar->addEvent($eventId, $command->title(), $pivotDate, $command->endDate(), $originalEvent->type(), new Repetitions($command->repetitions()));
            $newEvent = $calendar->getEventById($eventId);
            $this->eventRepository->insert($newEvent);
        }

        $this->eventRepository->update($originalEvent);
    }

    public function setEventDispatcher(EventDispatcher $dispatcher)
    {
        // TODO: Implement setEventDispatcher() method.
    }
}
