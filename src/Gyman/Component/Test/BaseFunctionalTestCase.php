<?php
namespace Gyman\Component\Test;

use Dende\CommonBundle\Tests\BaseFunctionalTest as BaseTest;
use Doctrine\Common\DataFixtures\ReferenceRepository;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\CalendarsData;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\EntriesData;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\EventsData;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\MembersData;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\OccurrencesData;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\SectionsData;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\VouchersData;
use Gyman\Bundle\ClubBundle\DataFixtures\StandardConnection\ORM\ClubsData;
use Gyman\Bundle\ClubBundle\DataFixtures\StandardConnection\ORM\UsersData;

abstract class BaseFunctionalTestCase extends BaseTest
{
    /** @var  ReferenceRepository */
    protected $fixtures;

    /** @var  ReferenceRepository */
    protected $tenantFixtures;

    public function setUp()
    {
        parent::setUp();

        $this->fixtures = $this->loadFixtures([
            UsersData::class,
            ClubsData::class,
        ], 'default')->getReferenceRepository();

        $this->tenantFixtures = $this->loadFixtures([
            EntriesData::class,
            VouchersData::class,
            MembersData::class,
            CalendarsData::class,
            SectionsData::class,
            EventsData::class,
            OccurrencesData::class,
        ], 'tenant')->getReferenceRepository();
    }
}
