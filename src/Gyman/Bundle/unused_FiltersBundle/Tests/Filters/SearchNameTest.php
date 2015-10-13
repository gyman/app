<?php
namespace Dende\Filters\Tests\Filters;

use Gyman\Bundle\FiltersBundle\Filters\SearchName;
use Gyman\Bundle\TestBundle\Tests\BaseTest;

class SearchNameTest extends BaseTest
{
    /**
     * @dataProvider applyToQueryDataProvider
     */
    public function testApply($options, $expectedDql, $parameterCount, $expectedParameters, $expectedString)
    {
        $queryBuilder = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('GymanAppBundle:Member')
            ->createQueryBuilder('m');

        $searchNameFilter = new SearchName();
        $searchNameFilter->setOptions($options);
        $searchNameFilter->apply($queryBuilder);

        $dql = $queryBuilder->getQuery()->getDQL();

        $this->assertEquals($expectedDql, $dql);

        $parameters = $queryBuilder->getParameters();

        $this->assertEquals($parameters->count(), $parameterCount);
        $this->assertParameterEqual($expectedParameters[0], $expectedString['string'], $parameters->get(0));
    }

    public function applyToQueryDataProvider()
    {
        return [
            [
                'options'            => [
                    'search' => 'abc',
                ],
                'expectedDql'        => "SELECT m FROM Gyman\Bundle\AppBundle\Entity\Member m WHERE m.name LIKE :string OR m.notes LIKE :string",
                'parameterCount'     => 1,
                'expectedParameters' => [
                    'string',
                ],
                'expectedString'     => [
                    'string' => '%abc%',
                ],
            ],
        ];
    }
}