<?php

namespace Dende\Filters\Tests\Filters;

use Gyman\Bundle\TestBundle\Tests\BaseTest;
use Gyman\Bundle\FiltersBundle\Filters\CurrentVoucher;

class CurrentVoucherTest extends BaseTest
{

    /**
     * @dataProvider applyToQueryDataProvider
     */
    public function testApplyToQuery($currentVoucher, $expectedDql)
    {
        $queryBuilder = $this->container
            ->get("doctrine.orm.entity_manager")
            ->getRepository("MembersBundle:Member")
            ->createQueryBuilder("m");

        $currentVoucherFilter = new CurrentVoucher();
        $currentVoucherFilter->setOptions(["currentVoucher" => $currentVoucher]);
        $currentVoucherFilter->apply($queryBuilder);

        $dql = $queryBuilder->getQuery()->getDQL();
        $this->assertEquals($expectedDql, $dql);
    }

    public function applyToQueryDataProvider()
    {
        return [
            [
                "currentVoucher" => true,
                "expectedDql"    => "SELECT m FROM Gyman\Bundle\MembersBundle\Entity\Member m WHERE m.currentVoucher is not null"
            ],
            [
                "currentVoucher" => false,
                "expectedDql"    => "SELECT m FROM Gyman\Bundle\MembersBundle\Entity\Member m WHERE m.currentVoucher is null"
            ],
        ];
    }
}
