<?php

namespace Dende\Filters\Tests\Filters;

use Gyman\Bundle\FiltersBundle\Filters\Age;
use Gyman\Bundle\TestBundle\Tests\BaseTest;

class AgeTest extends BaseTest
{
    /**
     * @dataProvider applyToQueryDataProvider
     */
    public function testApplyToQuery($options, $expectedDql, $parameterCount)
    {
        $queryBuilder = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('MembersBundle:Member')
            ->createQueryBuilder('m');

        $ageFilter = new Age();
        $ageFilter->setOptions($options);
        $ageFilter->apply($queryBuilder);

        $dql = $queryBuilder->getQuery()->getDQL();

        $this->assertEquals($expectedDql, $dql);
        $this->assertEquals($queryBuilder->getParameters()->count(), $parameterCount);
    }

    public function applyToQueryDataProvider()
    {
        return [
            [
                'options'        => [
                    'type' => 'between',
                    'age1' => '1',
                    'age2' => '2',
                ],
                'expectedDql'    => "SELECT m FROM Gyman\Bundle\MembersBundle\Entity\Member m "
                . 'WHERE m.birthdate >= :dateFrom AND m.birthdate <= :dateTo',
                'parameterCount' => 2,
            ],
            [
                'options'        => [
                    'type' => 'gt',
                    'age1' => '1',
                    'age2' => '2',
                ],
                'expectedDql'    => "SELECT m FROM Gyman\Bundle\MembersBundle\Entity\Member m "
                . 'WHERE m.birthdate <= :dateTo',
                'parameterCount' => 1,
            ],
            [
                'options'        => [
                    'type' => 'lt',
                    'age1' => '1',
                    'age2' => '2',
                ],
                'expectedDql'    => "SELECT m FROM Gyman\Bundle\MembersBundle\Entity\Member m "
                . 'WHERE m.birthdate >= :dateFrom',
                'parameterCount' => 1,
            ],
        ];
    }
}
