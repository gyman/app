<?php

namespace Gyman\Bundle\TimelineBundle\Subscriber;

use Gyman\Bundle\EntriesBundle\EntriesEvents;
use Gyman\Bundle\EntriesBundle\Event\EntryCreatedEvent;
use Gyman\Bundle\MembersBundle\Event\MemberCreatedEvent;
use Gyman\Bundle\MembersBundle\MembersEvents;
use Gyman\Bundle\VouchersBundle\VouchersEvents;
use Gyman\Bundle\VouchersBundle\Event\VoucherCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Gyman\Bundle\TimelineBundle\Timeline\EventsHandler;

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
        return array(
            MembersEvents::CREATED => [['onMemberCreated', 0]],
            VouchersEvents::CREATED => [['onVoucherCreated', 0]],
            EntriesEvents::CREATED => [['onEntryCreated', 0]]
        );
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
