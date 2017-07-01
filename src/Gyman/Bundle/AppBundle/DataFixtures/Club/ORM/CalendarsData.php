<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Dende\Calendar\Domain\Calendar;
use Dende\CalendarBundle\Tests\DataFixtures\BaseFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class CalendarsData
 * @package Dende\CalendarBundle\Tests\DataFixtures\Standard\ORM
 */
final class CalendarsData extends BaseFixture implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /** @var string  */
    protected $dir = __DIR__;

    /**
     * @return int
     */
    public function getOrder()
    {
        return -100;
    }

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param $params
     * @return Calendar
     */
    public function insert($params)
    {
        $calendar = $this->container->get("gyman.calendar.factory")->createFromArray([
            "title" => $params["name"]
        ]);

        return $calendar;
    }
}
