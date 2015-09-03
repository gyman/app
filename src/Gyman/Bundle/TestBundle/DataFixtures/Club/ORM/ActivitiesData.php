<?php
namespace Gyman\Bundle\TestBundle\DataFixtures\Club\ORM;

use Gyman\Bundle\ScheduleBundle\Entity\Activity;
use Gyman\Bundle\TestBundle\DataFixtures\BaseFixture;

class ActivitiesData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return 3;
    }

    /**
     * @param $params
     * @return Activity
     */
    public function insert($params)
    {
        extract($params);
        $activity = new Activity();
        $activity->setName($name);

        return $activity;
    }
}
