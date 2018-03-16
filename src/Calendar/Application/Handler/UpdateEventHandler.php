<?php
namespace Gyman\Calendar\Application\Handler;

use Gyman\Calendar\Application\Command\UpdateEventCommand;
use Gyman\Calendar\Application\Event\PostUpdateEvent;
use Gyman\Calendar\Application\Events;
use Gyman\Calendar\Application\Repository\EventRepositoryInterface;
use Gyman\Calendar\Domain\Calendar\Event;
use Gyman\Calendar\Domain\Calendar\Event\EventData;
use Gyman\Calendar\Domain\Calendar\Event\Repetitions;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class UpdateEventHandler
{
    /** @var EventRepositoryInterface */
    private $eventRepository;

    /** @var EventDispatcherInterface */
    private $eventDispatcher;

    /**
     * UpdateEventHandler constructor.
     *
     * @param EventRepositoryInterface $eventRepository
     */
    public function __construct(EventRepositoryInterface $eventRepository, EventDispatcherInterface $eventDispatcher)
    {
        $this->eventRepository = $eventRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handle(UpdateEventCommand $command)
    {
        /** @var Event $event */
        $event = $this->eventRepository->findOneById($command->eventId());
        $event->update(new EventData($command->startDate(), $command->endDate(), $command->title(), new Repetitions($command->repetitions())));
        $this->eventRepository->update($event);

        $this->eventDispatcher->dispatch(Events::POST_UPDATE_EVENT, new PostUpdateEvent($event, $command->occurrenceId(), $command->method()));
    }
}
