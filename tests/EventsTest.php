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
        $this->tenantFixtures = $this->loadFixtures([
            CalendarsData::class,
            EventsData::class,
            OccurrencesData::class,
        ], 'tenant')->getReferenceRepository();
    }

    /**
     * @test
     */
    public function aaa()
    {
//        $appRepository = $this->container->get('doctrine.orm.tenant_entity_manager')->getRepository(
//            Gyman\Domain\Calendar\Event::class
//        );
//
//        $bundleRepository = $this->container->get('doctrine.orm.tenant_entity_manager')->getRepository(
//            Dende\Calendar\Domain\Calendar\Event::class
//        );
//
//        $this->assertEquals(get_class($appRepository), \Gyman\Bundle\AppBundle\Repository\EventRepository::class);
//        $this->assertEquals(get_class($bundleRepository), \Dende\CalendarBundle\Repository\ORM\EventRepository::class);
    }
}