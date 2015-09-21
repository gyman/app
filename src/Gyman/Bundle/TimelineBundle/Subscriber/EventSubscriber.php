<?php

namespace Gyman\Bundle\TimelineBundle\Subscriber;

use Gyman\Bundle\AppBundle\Event\MemberCreatedEvent;
use Gyman\Bundle\AppBundle\Event\VoucherCreatedEvent;
use Gyman\Bundle\AppBundle\MembersEvents;
use Gyman\Bundle\AppBundle\VouchersEvents;
use Gyman\Bundle\EntriesBundle\EntriesEvents;
use Gyman\Bundle\EntriesBundle\Event\EntryCreatedEvent;
use Gyman\Bundle\TimelineBundle\Timeline\EventsHandler;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EventSubscriber implements EventSubscriberInterface
{
    /**
     * @var EventsHandler $eventsHandler
     */
    private $eventsHandler;

    public function __construct(EventsHandler $eventsHandler)
    {
        $this->eventsHandler = $eventsHandler;
    }

    public static function getSubscribedEvents()
    {
        return [
            MembersEvents::CREATED  => [['onMemberCreated', 0]],
            VouchersEvents::CREATED => [['onVoucherCreated', 0]],
            EntriesEvents::CREATED  => [['onEntryCreated', 0]],
        ];
    }

    public function onMemberCreated(MemberCreatedEvent $event)
    {
        $this->eventsHandler->onMemberCreated($event);
    }

    public function onVoucherCreated(VoucherCreatedEvent $event)
    {
        $this->eventsHandler->onVoucherCreated($event);
    }

    public function onEntryCreated(EntryCreatedEvent $event)
    {
        $this->eventsHandler->onEntryCreated($event);
    }
}
