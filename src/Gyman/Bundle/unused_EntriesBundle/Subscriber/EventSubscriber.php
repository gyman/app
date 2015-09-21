<?php

namespace Gyman\Bundle\EntriesBundle\Subscriber;

use Gyman\Bundle\AppBundle\EntityManager\MemberManager;
use Gyman\Bundle\EntriesBundle\EntriesEvents;
use Gyman\Bundle\EntriesBundle\Event\EntryCreatedEvent;
use Gyman\Bundle\EntriesBundle\Event\EventsHandler;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EventSubscriber implements EventSubscriberInterface
{
    /**
     * @var EventsHandler $eventsHandler
     */
    private $eventsHandler;

    /**
     * @var MemberManager
     */
    protected $memberManager;

    /**
     * @param EventsHandler $eventsHandler
     * @param MemberManager $memberManager
     */
    public function __construct(EventsHandler $eventsHandler, MemberManager $memberManager)
    {
        $this->eventsHandler = $eventsHandler;
        $this->memberManager = $memberManager;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            EntriesEvents::CREATED => [['onEntryCreated', 0]],
        ];
    }

    /**
     * @param EntryCreatedEvent $event
     */
    public function onEntryCreated(EntryCreatedEvent $event)
    {
        $this->eventsHandler->onEntryCreated($event);
    }
}
