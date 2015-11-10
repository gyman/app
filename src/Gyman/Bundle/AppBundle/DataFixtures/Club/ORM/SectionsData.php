<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Carbon\Carbon;
use Dende\Calendar\Domain\Calendar;
use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\AppBundle\Entity\Member;
use Gyman\Bundle\AppBundle\Entity\Section;
use Gyman\Domain\Model\Section\SectionId;

class SectionsData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return 50;
    }

    public function insert($array)
    {
        /** @var Calendar $calendar */
        $calendar = $this->getReference($array["calendar"]);
        $section = new Section(new SectionId(null), $array["title"], $calendar);

        foreach($array["members"] as $memberReference) {
            /** @var Member $member */
            $member = $this->getReference($memberReference);
            $section->addMember($member);
        }

        $this->manager->persist($section);

        return $section;
    }
}
