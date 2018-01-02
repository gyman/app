<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use DateTime;
use Dende\Calendar\Domain\Calendar\Event;
use Dende\Calendar\Domain\Calendar\Event\EventId;
use Dende\Calendar\Domain\Calendar\Event\EventType;
use Dende\Calendar\Domain\Calendar\Event\Repetitions;
use Gyman\Bundle\AppBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\AppBundle\Factory\OccurrenceFactory;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class EventsData extends BaseFixture implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return 10;
    }

    public function insert(array $params = []): Event
    {
        Event::setFactoryClass(OccurrenceFactory::class);

        $array = [
            'eventId'     => EventId::create(Uuid::fromString($params['eventId'])),
            'calendar'    => $this->getReference($params['calendar']),
            'startDate'   => new DateTime($params['startDate']),
            'endDate'     => new DateTime($params['endDate']),
            'repetitions' => new Repetitions($params['repetitions']),
            'title'       => $params['title'],
            'type'        => new EventType($params['type']),
        ];

        /** @var Event $event */
        $event = $this->getContainer()->get('gyman.event.factory')->createFromArray($array);

        return $event;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }
}
