<?php
namespace Gyman\Bundle\AppBundle\Factory;

use DateTime;
use Dende\Calendar\Application\Factory\EventFactoryInterface;
use Dende\Calendar\Application\Factory\EventFactory as BaseEventFactory;
use Dende\Calendar\Domain\Calendar;
use Dende\Calendar\Domain\Calendar\Event\Duration;
use Dende\Calendar\Domain\Calendar\Event\EventType;
use Dende\Calendar\Domain\Calendar\Event\Repetitions;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Calendar\Event;

/**
 * Class EventFactory
 * @package Gyman\Bundle\AppBundle\Factory
 */
class EventFactory extends BaseEventFactory implements EventFactoryInterface
{

    /**
     * @param $params
     * @return Event
     */
    public function createFromArray($array)
    {
        $template = [
            'id'                     => $this->idGenerator->generateId(),
            'title'                  => '',
            'repetitions'            => new Repetitions([]),
            'type'                   => new EventType(),
            'occurrences'            => new ArrayCollection(),
            'calendar'               => new Calendar(null, ''),
            'duration'               => new Duration(0),
            'startDate'              => new DateTime('now'),
            'endDate'                => new DateTime('now'),
        ];

        $array = array_merge($template, $array);

        return new Event(
            $array['id'],
            $array['calendar'],
            $array['type'],
            $array['startDate'],
            $array['endDate'],
            $array['title'],
            $array['repetitions'],
            $array['duration']
        );
    }
}