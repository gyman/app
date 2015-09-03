<?php
namespace Dende\Filters\Tests\Filters;

use Gyman\Bundle\FiltersBundle\Filters\Gender;
use Gyman\Bundle\TestBundle\Tests\BaseTest;

class GenderTest extends BaseTest
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

        $genderFilter = new Gender();
        $genderFilter->setOptions($options);
        $genderFilter->apply($queryBuilder);

        $dql = $queryBuilder->getQuery()->getDQL();

        $this->assertEquals($expectedDql, $dql);
        $this->assertEquals($queryBuilder->getParameters()->count(), $parameterCount);
    }

    public function applyToQueryDataProvider()
    {
        return [
            [
                'options'        => [
                    'gender' => 'male',
                ],
                'expectedDql'    => "SELECT m FROM Gyman\Bundle\MembersBundle\Entity\Member m WHERE m.gender = :gender",
                'parameterCount' => 1,
            ],
        ];
    }
}
