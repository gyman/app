<?php
namespace Gyman\Domain\Handler;

use Gyman\Domain\Command\CreateEventCommand;
use Gyman\Domain\Factory\EventFactory;
use Gyman\Domain\Factory\OccurenceFactory;
use Gyman\Domain\Model\Calendar;
use Gyman\Domain\Repository\EventRepositoryInterface;
use Gyman\Domain\Service\GetOccurenceCollectionFromEventCommand;

class CreateEventHandler
{
    /**
     * @var Calendar
     */
    private $calendar;

    /**
     * @var GetOccurenceCollectionFromEventCommand
     */
    private $occurenceProducer;

    /**
     * @var EventRepositoryInterface
     */
    private $eventRepository;

    /**
     * CreateEventHandler constructor.
     * @param Calendar $calendar
     * @param EventRepositoryInterface $eventRepository
     * @param GetOccurenceCollectionFromEventCommand $producer
     */
    public function __construct(Calendar $calendar, EventRepositoryInterface $eventRepository, GetOccurenceCollectionFromEventCommand $producer)
    {
        $this->calendar = $calendar;
        $this->eventRepository = $eventRepository;
        $this->occurenceProducer = $producer;
    }

    /**
     * @param CreateEventCommand $command
     */
    public function handle(CreateEventCommand $command)
    {
        $event = EventFactory::createFromCommand($command);

        foreach($this->occurenceProducer->produce($command) as $occurence) {
            $event->occurences()->add($occurence);
        }

        $this->eventRepository->insert($event);

        //dispatcher
    }
}