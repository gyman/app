<?php
namespace Dende\Filters\Tests\Filters;

use Gyman\Bundle\FiltersBundle\Filters\Starred;
use Gyman\Bundle\TestBundle\Tests\BaseTest;

class StarredTest extends BaseTest
{
    /**
     * @dataProvider applyToQueryDataProvider
     */
    public function testApplyToQuery($starred, $expectedDql, $expectedCount)
    {
        $queryBuilder = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('GymanAppBundle:Member')
            ->createQueryBuilder('m');

        $starredFilter = new Starred();
        $starredFilter->setOptions(['starred' => $starred]);
        $starredFilter->apply($queryBuilder);

        $dql = $queryBuilder->getQuery()->getDQL();
        $this->assertEquals($expectedDql, $dql);
        $this->assertEquals($queryBuilder->getParameters()->count(), $expectedCount);
    }

    public function applyToQueryDataProvider()
    {
        return [
            [
                'starred'       => true,
                'expectedDql'   => "SELECT m FROM Gyman\Bundle\AppBundle\Entity\Member m WHERE m.starred = true",
                'expectedCount' => 0,
            ],
            [
                'starred'       => false,
                'expectedDql'   => "SELECT m FROM Gyman\Bundle\AppBundle\Entity\Member m WHERE m.starred is null or m.starred = false",
                'expectedCount' => 0,
            ],
        ];
    }
}
