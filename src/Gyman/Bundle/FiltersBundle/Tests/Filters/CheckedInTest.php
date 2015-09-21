<?php

namespace Dende\Filters\Tests\Filters;

use Gyman\Bundle\FiltersBundle\Filters\CheckedIn;
use Gyman\Bundle\TestBundle\Tests\BaseTest;

class CheckedInTest extends BaseTest
{
    /**
     * @dataProvider applyToQueryDataProvider
     */
    public function testApplyToQuery($checkedIn, $expectedDql, $expectedCount)
    {
        $queryBuilder = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('GymanAppBundle:Member')
            ->createQueryBuilder('m');

        $checkedInFilter = new CheckedIn();
        $checkedInFilter->setOptions(['checkedIn' => $checkedIn]);
        $checkedInFilter->apply($queryBuilder);

        $dql = $queryBuilder->getQuery()->getDQL();
        $this->assertEquals($expectedDql, $dql);
        $this->assertEquals($queryBuilder->getParameters()->count(), $expectedCount);
    }

    public function applyToQueryDataProvider()
    {
        return [
            [
                'checkedIn'     => true,
                'expectedDql'   => "SELECT m FROM Gyman\Bundle\AppBundle\Entity\Member m WHERE m.lastEntry is not null and (m.lastEntry.endDate is null or m.lastEntry.endDate < :now)",
                'expectedCount' => 1,
            ],
            [
                'checkedIn'     => false,
                'expectedDql'   => "SELECT m FROM Gyman\Bundle\AppBundle\Entity\Member m WHERE m.lastEntry is null",
                'expectedCount' => 0,
            ],
        ];
    }
}
