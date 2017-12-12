<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Dende\Calendar\Domain\Calendar;
use Gyman\Bundle\AppBundle\DataFixtures\BaseFixture;
use Gyman\Domain\Section;
use Gyman\Domain\Section\SectionId;

class SectionsData extends BaseFixture
{
    public function getOrder() : int
    {
        return 0;
    }

    public function insert(array $array = []) : Section
    {
        /** @var Calendar $calendar */
        $calendar = $this->getReference($array["calendar"]);

        $section = new Section(SectionId::create(), $array["title"], $calendar);

        return $section;
    }
}
