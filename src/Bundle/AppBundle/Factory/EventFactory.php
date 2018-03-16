<?php
namespace Gyman\Bundle\AppBundle\Factory;

use DateTime;
use Gyman\Calendar\Application\Factory\EventFactory as BaseEventFactory;
use Gyman\Calendar\Domain\Calendar\Event\EventId;
use Gyman\Calendar\Domain\Calendar\Event\EventType;
use Gyman\Calendar\Domain\Calendar\Event\Repetitions;
use Gyman\Domain\Calendar\Event;
use Gyman\Calendar\Domain\Calendar\Event as BaseEvent;
use Ramsey\Uuid\Uuid;

/**
 * Class EventFactory
 * @package Gyman\Bundle\AppBundle\Factory
 */
class EventFactory extends BaseEventFactory
{

    /**
     * @param array $array
     * @return BaseEvent|Event
     */
    public static function createFromArray(array $array = []) : BaseEvent
    {
        $template = [
            'eventId'                => EventId::create(Uuid::fromString($array['eventId'])),
            'title'                  => '',
            'repetitions'            => new Repetitions(),
            'type'                   => new EventType(),
            'occurrences'            => null,
            'calendar'               => null,
            'startDate'              => new DateTime('now'),
            'endDate'                => new DateTime('now'),
        ];

        $array = array_merge($template, $array);

        return new Event(
            $array['eventId'],
            $array['calendar'],
            $array['type'],
            $array['startDate'],
            $array['endDate'],
            $array['title'],
            $array['repetitions'],
            $array['occurrences']
        );
    }
}