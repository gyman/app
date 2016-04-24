<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use DateTime;
use Dende\Calendar\Application\Command\CreateEventCommand;
use Dende\Calendar\Application\Factory\EventFactory;
use Dende\Calendar\Domain\Calendar;
use Dende\Calendar\Domain\Calendar\Event;
use Dende\Calendar\Domain\Calendar\Event\Duration;
use Dende\CommonBundle\DataFixtures\BaseFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class EventsData
 * @package Dende\CalendarBundle\Tests\DataFixtures\Standard\ORM
 */
class OccurrencesData extends BaseFixture implements ContainerAwareInterface
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
        return 20;
    }

    /**
     * @param $params
     * @return Event
     */
    public function insert($params)
    {
        $event = $this->getReference($params["event"]);

        $occurrence = $this->getContainer()->get('gyman.occurrence.factory')->createFromArray([
            'startDate' => new DateTime($params["startDate"]),
            'duration'  => new Duration($params["minutes"]),
            'event'     => $event,
        ]);

        return $occurrence;
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
