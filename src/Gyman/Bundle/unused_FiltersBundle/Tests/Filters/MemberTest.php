<?php
namespace Dende\Filters\Tests\Filters;

use Gyman\Bundle\FiltersBundle\Filters\Member;
use Gyman\Bundle\TestBundle\Tests\BaseTest;

class MemberTest extends BaseTest
{
    /**
     * @dataProvider applyToQueryDataProvider
     */
    public function testApplyToQuery($options, $expectedDql, $parameterCount)
    {
        $queryBuilder = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('GymanAppBundle:Member')
            ->createQueryBuilder('m');

        $memberFilter = new Member();
        $memberFilter->setOptions($options);
        $memberFilter->apply($queryBuilder);

        $dql = $queryBuilder->getQuery()->getDQL();

        $this->assertEquals($expectedDql, $dql);
        $this->assertEquals($queryBuilder->getParameters()->count(), $parameterCount);
    }

    public function applyToQueryDataProvider()
    {
        return [
            [
                'options'        => [
                    'member' => 15,
                ],
                'expectedDql'    => "SELECT m FROM Gyman\Bundle\AppBundle\Entity\Member m WHERE m.id = 15",
                'parameterCount' => 0,
            ],
        ];
    }
}
