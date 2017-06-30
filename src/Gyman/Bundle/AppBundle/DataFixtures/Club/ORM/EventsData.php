<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use DateTime;
use Dende\Calendar\Domain\Calendar\Event;
use Dende\Calendar\Domain\Calendar\Event\EventId;
use Dende\Calendar\Domain\Calendar\Event\EventType;
use Dende\Calendar\Domain\Calendar\Event\Repetitions;
use Dende\CalendarBundle\Tests\DataFixtures\BaseFixture;
use Gyman\Bundle\AppBundle\Factory\OccurrenceFactory;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class EventsData
 * @package Dende\CalendarBundle\Tests\DataFixtures\Standard\ORM
 */
final class EventsData extends BaseFixture implements ContainerAwareInterface
{
    /** @var string $dir */
    protected $dir = __DIR__;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @return int
     */
    public function getOrder()
    {
        return 10;
    }

    /**
     * @param $params
     * @return Event
     */
    public function insert($params)
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

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }
}
