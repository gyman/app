<?php
namespace Dende\Filters\Tests\Filters;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\FiltersBundle\Filters\Activities;
use Gyman\Bundle\ScheduleBundle\Entity\Activity;
use Gyman\Bundle\TestBundle\Tests\BaseTest;

class ActivitiesTest extends BaseTest
{
    /**
     * @dataProvider applyToQueryDataProvider
     */
    public function testApplyToQuery($activity, $expectedDql)
    {
        $queryBuilder = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('ScheduleBundle:Activity')
            ->createQueryBuilder('a');

        $activityFilter = new Activities();
        $activityFilter['activities'] = $activity;
        $activityFilter->apply($queryBuilder);

        $dql = $queryBuilder->getQuery()->getDQL();

        $this->assertEquals($expectedDql, $dql);
        $this->assertEquals($queryBuilder->getParameters()->count(), 0);
    }

    public function applyToQueryDataProvider()
    {
        return [
            [
                'activity'    => new ArrayCollection(call_user_func(function () {
                    $activity = new Activity();
                    $activity->setId(10);
                    $activity->setName('testActivity');

                    return [$activity];
                })),
                'expectedDql' => "SELECT a FROM Gyman\Bundle\ScheduleBundle\Entity\Activity a WHERE a.id IN(10)",
                ],
                [
                'activity'    => new ArrayCollection(call_user_func(function () {
                    $activity = new Activity();
                    $activity->setId(10);
                    $activity->setName('testActivity');

                    $activity2 = new Activity();
                    $activity2->setId(20);
                    $activity2->setName('testActivity2');

                    return [$activity, $activity2];
                })),
                'expectedDql' => "SELECT a FROM Gyman\Bundle\ScheduleBundle\Entity\Activity a WHERE a.id IN(10, 20)",
                ],
                [
                'activity'    => new ArrayCollection([]),
                'expectedDql' => "SELECT a FROM Gyman\Bundle\ScheduleBundle\Entity\Activity a",
                ],
                ];
    }
}
