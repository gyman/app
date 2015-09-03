<?php
namespace Dende\Filters\Tests\Filters;

use Gyman\Bundle\FiltersBundle\Filters\Belt;
use Gyman\Bundle\TestBundle\Tests\BaseTest;

class BeltTest extends BaseTest
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

        $beltFilter = new Belt();
        $beltFilter->setOptions($options);
        $beltFilter->apply($queryBuilder);

        $dql = $queryBuilder->getQuery()->getDQL();

        $this->assertEquals($expectedDql, $dql);
        $this->assertEquals($queryBuilder->getParameters()->count(), $parameterCount);
    }

    public function applyToQueryDataProvider()
    {
        return [
            [
                'options'        => [
                    'type' => 'not',
                    'belt' => 'blue',
                ],
                'expectedDql'    => "SELECT m FROM Gyman\Bundle\MembersBundle\Entity\Member m WHERE m.belt != :belt",
                'parameterCount' => 1,
            ],
            [
                'options'        => [
                    'type' => 'gt',
                    'belt' => 'blue',
                ],
                'expectedDql'    => "SELECT m FROM Gyman\Bundle\MembersBundle\Entity\Member m WHERE m.belt NOT IN('white', 'blue') AND m.belt is not null",
                'parameterCount' => 0,
            ],
            [
                'options'        => [
                    'type' => 'lt',
                    'belt' => 'blue',
                ],
                'expectedDql'    => "SELECT m FROM Gyman\Bundle\MembersBundle\Entity\Member m WHERE m.belt NOT IN('blue', 'purple', 'brown', 'black') OR m.belt IS NULL",
                'parameterCount' => 0,
            ],
            [
                'options'        => [
                    'type' => 'eq',
                    'belt' => 'blue',
                ],
                'expectedDql'    => "SELECT m FROM Gyman\Bundle\MembersBundle\Entity\Member m WHERE m.belt = :belt",
                'parameterCount' => 1,
            ],
            [
                'options'        => [
                    'type' => 'eq',
                    'belt' => 'white',
                ],
                'expectedDql'    => "SELECT m FROM Gyman\Bundle\MembersBundle\Entity\Member m WHERE m.belt = :belt OR m.belt IS NULL",
                'parameterCount' => 1,
            ],
            [
                'options'        => [
                    'type' => 'not',
                    'belt' => 'white',
                ],
                'expectedDql'    => "SELECT m FROM Gyman\Bundle\MembersBundle\Entity\Member m WHERE NOT(m.belt = :belt) AND m.belt IS NOT NULL",
                'parameterCount' => 1,
            ],
        ];
    }
}
