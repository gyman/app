<?php

namespace Dende\Filters\Tests\Filters;

use Gyman\Bundle\FiltersBundle\Filters\EntryType;
use Gyman\Bundle\TestBundle\Tests\BaseTest;

class EntryTypeTest extends BaseTest
{
    /**
     * @dataProvider applyToQueryDataProvider
     */
    public function testApplyToQuery($options, $expectedDql, $parameterCount)
    {
        $queryBuilder = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('EntriesBundle:Entry')
            ->createQueryBuilder('e');

        $entryTypeFilter = new EntryType();
        $entryTypeFilter->setOptions($options);
        $entryTypeFilter->apply($queryBuilder);

        $dql = $queryBuilder->getQuery()->getDQL();

        $this->assertEquals($expectedDql, $dql);
        $this->assertEquals($queryBuilder->getParameters()->count(), $parameterCount);
    }

    public function applyToQueryDataProvider()
    {
        return [
            [
                'options'        => [
                    'type'      => 'not',
                    'entryType' => 'free',
                ],
                'expectedDql'    => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.entryType != :entryType",
                'parameterCount' => 1,
            ],
            [
                'options'        => [
                    'type'      => 'eq',
                    'entryType' => 'voucher',
                ],
                'expectedDql'    => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.entryType = :entryType",
                'parameterCount' => 1,
            ],
        ];
    }
}
