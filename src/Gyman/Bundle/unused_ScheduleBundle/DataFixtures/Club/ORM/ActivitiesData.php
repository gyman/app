<?php
namespace Gyman\Bundle\TestBundle\DataFixtures\Club\ORM;

use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\ScheduleBundle\Entity\Activity;

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
