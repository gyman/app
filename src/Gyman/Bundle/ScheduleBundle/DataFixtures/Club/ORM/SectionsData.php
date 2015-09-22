<?php
namespace Gyman\Bundle\TestBundle\DataFixtures\Club\ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\SectionBundle\Entity\Section;
use Dende\CommonBundle\DataFixtures\BaseFixture;

class SectionsData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return 15;
    }
    public function insert($params)
    {
        $section = new Section();
        $section->setName($params['name']);
//        $section->setClub($this->getReference($params["club"]));
        $section->setMembers($this->prepareMembers($params['members']));

        return $section;
    }

    /**
     * @param  array           $members
     * @return ArrayCollection
     */
    public function prepareMembers($members)
    {
        $result = [];

        foreach ($members as $member) {
            $result[] = $this->getReference($member);
        }

        return new ArrayCollection($result);
    }
}
