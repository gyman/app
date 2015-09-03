<?php
namespace Gyman\Component\Test;

use Dende\CommonBundle\Tests\BaseFunctionalTest as BaseTest;

abstract class BaseFunctionalTest extends BaseTest
{
    public function setUp()
    {
        parent::setUp();

        $this->loadFixtures([
            "Gyman\Bundle\TestBundle\DataFixtures\StandardConnection\ORM\UsersData",
            "Gyman\Bundle\ClubBundle\DataFixtures\StandardConnection\ORM\ClubsData",
        ], 'default');

        $this->loadFixtures([
            "Gyman\Bundle\VouchersBundle\DataFixtures\Club\ORM\EntriesData",
            "Gyman\Bundle\VouchersBundle\DataFixtures\Club\ORM\VouchersData",
            "Gyman\Bundle\MembersBundle\DataFixtures\Club\ORM\MembersData",
            "Gyman\Bundle\TestBundle\DataFixtures\Club\ORM\ActivitiesData",
            "Gyman\Bundle\TestBundle\DataFixtures\Club\ORM\EventsData",
            "Gyman\Bundle\TestBundle\DataFixtures\Club\ORM\SectionsData",
        ], 'club');
    }
}