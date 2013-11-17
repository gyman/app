<?php
/**
 * Created by PhpStorm.
 * User: uirapuru
 * Date: 18.09.14
 * Time: 00:42
 */

namespace Gyman\Bundle\TestBundle\DataFixtures\ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\TestBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\SectionBundle\Entity\Section;

class SectionsData extends BaseFixture
{
    public function getOrder()
    {
        return 15;
    }
    public function insert($params)
    {
        $section = new Section();
        $section->setName($params["name"]);
        $section->setClub($this->getReference($params["club"]));
        $section->setMembers($this->prepareMembers($params["members"]));

        return $section;
    }

    /**
     * @param array $members
     * @return ArrayCollection
     */
    function prepareMembers($members) {
        $result = array();

        foreach ($members as $member) {
            $result[] = $this->getReference($member);
        }

        return new ArrayCollection($result);
    }

}
