<?php
namespace Gyman\Component\Test;

use Dende\CommonBundle\Tests\BaseFunctionalTest as BaseTest;

abstract class BaseFunctionalTest extends BaseTest
{
    public function setUp()
    {
        parent::setUp();

        $this->loadFixtures([
            "Gyman\\Bundle\\TestBundle\\DataFixtures\\StandardConnection\\ORM\\UsersData",
            "Gyman\\Bundle\\ClubBundle\\DataFixtures\\StandardConnection\\ORM\\ClubsData",
        ], 'default');

        $this->loadFixtures([
            "Gyman\\Bundle\\AppBundle\\DataFixtures\\Club\\ORM\\EntriesData",
            "Gyman\\Bundle\\AppBundle\\DataFixtures\\Club\\ORM\\VouchersData",
            "Gyman\\Bundle\\AppBundle\\DataFixtures\\Club\\ORM\\MembersData",
            "Gyman\\Bundle\\AppBundle\\DataFixtures\\Club\\ORM\\SectionsData",
            "Dende\\CalendarBundle\\Tests\\DataFixtures\\Standard\\ORM\\CalendarsData",
            "Dende\\CalendarBundle\\Tests\\DataFixtures\\Standard\\ORM\\EventsData",
            "Dende\\CalendarBundle\\Tests\\DataFixtures\\Standard\\ORM\\OccurrencesData",
        ], 'club');
    }
}
