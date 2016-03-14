<?php
namespace Gyman\Component\Test;

use Dende\CalendarBundle\DataFixtures\ORM\CalendarsData;
use Dende\CalendarBundle\DataFixtures\ORM\EventsData;
use Dende\CalendarBundle\DataFixtures\ORM\OccurrencesData;
use Dende\CommonBundle\Tests\BaseFunctionalTest as BaseTest;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\EntriesData;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\MembersData;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\SectionsData;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\VouchersData;
use Gyman\Bundle\ClubBundle\DataFixtures\StandardConnection\ORM\ClubsData;
use Gyman\Bundle\TestBundle\DataFixtures\StandardConnection\ORM\UsersData;

abstract class BaseFunctionalTest extends BaseTest
{
    public function setUp()
    {
        parent::setUp();

        $this->loadFixtures([
            UsersData::class,
            ClubsData::class,
        ], 'default');

        $this->loadFixtures([
            EntriesData::class,
            VouchersData::class,
            MembersData::class,
            SectionsData::class,
            CalendarsData::class,
            EventsData::class,
            OccurrencesData::class,
        ], 'tenant');
    }
}
