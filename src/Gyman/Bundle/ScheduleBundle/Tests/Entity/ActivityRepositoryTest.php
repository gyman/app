<?php

namespace Gyman\Bundle\ScheduleBundle\Tests\Entity;

use Gyman\Bundle\TestBundle\Tests\BaseTest;

class ActivityRepositoryTest extends BaseTest
{
    public function testGetOccurencesForPeriodQueryBuilder()
    {
        $query = $this->container->get('activity_repository')->getPopularityQueryBuilder();

        $testDql = "SELECT a.name, count(en.id) as cnt "
            . "FROM Gyman\Bundle\ScheduleBundle\Entity\Activity a "
            . "INNER JOIN a.events e "
            . "INNER JOIN e.occurences o "
            . "INNER JOIN o.entries en "
            . "GROUP BY a.name "
            . "ORDER BY cnt DESC";

        $this->assertEquals($testDql, $query->getDQL());
        $this->assertEquals(0, $query->getParameters()->count());
    }
}
