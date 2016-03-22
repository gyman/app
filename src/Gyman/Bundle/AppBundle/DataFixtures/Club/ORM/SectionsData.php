<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Carbon\Carbon;
use Dende\Calendar\Domain\Calendar;
use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Domain\Member;
use Gyman\Domain\Section;

class SectionsData extends BaseFixture
{
    protected $dir = __DIR__;

    /**
     * @return int
     */
    public function getOrder()
    {
        return 0;
    }

    /**
     * @param $array
     * @return Section
     */
    public function insert($array)
    {
        /** @var Calendar $calendar */
        $calendar = $this->getReference($array["calendar"]);
        $section = new Section(null, $array["title"], $calendar);

        return $section;
    }
}
