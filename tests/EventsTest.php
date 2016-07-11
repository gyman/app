<?php
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\CalendarsData;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\EventsData;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\OccurrencesData;
use Gyman\Component\Test\BaseFunctionalTestCase;

/**
 * Created by PhpStorm.
 * User: uirapuru
 * Date: 10.07.16
 * Time: 18:30
 */
class EventsTest  extends BaseFunctionalTestCase
{
    protected function loadTestFixtures()
    {

    }

    /**
     * @test
     */
    public function test_classes()
    {
        $em = $this->container->get('doctrine.orm.tenant_entity_manager');

        $this->assertEquals(\Gyman\Bundle\AppBundle\Repository\CalendarRepository::class, get_class($em->getRepository(
            Gyman\Domain\Calendar::class
        )));

        $this->assertEquals(\Gyman\Bundle\AppBundle\Repository\EventRepository::class, get_class($em->getRepository(
            Gyman\Domain\Calendar\Event::class
        )));

        $this->assertEquals(\Gyman\Bundle\AppBundle\Repository\OccurrenceRepository::class, get_class($em->getRepository(
            Gyman\Domain\Calendar\Event\Occurrence::class
        )));
    }

    /**
     * @test
     */
    public function test_adding_calendar_to_db() {
        $em = $this->container->get('doctrine.orm.tenant_entity_manager');
        $newCalendar = $this->container->get("gyman.calendar.factory")->createFromArray([]);

        $em->persist($newCalendar);
        $em->flush($newCalendar);

        $id = $newCalendar->id();

        $addedCalendar = $em->getRepository(\Gyman\Domain\Calendar::class)->findOneById($id);

        $this->assertEquals($newCalendar, $addedCalendar);
        $this->assertEquals(\Gyman\Domain\Calendar::class, get_class($addedCalendar));
    }
}