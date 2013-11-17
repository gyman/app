<?php

namespace Dende\Filters\Tests\Filters;

use Gyman\Bundle\TestBundle\Tests\BaseTest;
use Gyman\Bundle\FiltersBundle\Filters\Price;

class PriceTest extends BaseTest
{

    /**
     * @dataProvider applyToQueryDataProvider
     */
    public function testApply($options, $expectedDql, $parameterCount, $expectedParameters, $expectedPrices)
    {
        $queryBuilder = $this->container
            ->get("doctrine.orm.entity_manager")
            ->getRepository("VouchersBundle:Voucher")
            ->createQueryBuilder("v");

        $priceFilter = new Price();
        $priceFilter->setOptions($options);
        $priceFilter->apply($queryBuilder);

        $dql = $queryBuilder->getQuery()->getDQL();

        $this->assertEquals($expectedDql, $dql);

        $parameters = $queryBuilder->getParameters();

        $this->assertEquals($parameters->count(), $parameterCount);
        if ($parameterCount == 2) {
            $this->assertParameterEqual($expectedParameters[0], $expectedPrices["price1"], $parameters->get(0));
            $this->assertParameterEqual($expectedParameters[1], $expectedPrices["price2"], $parameters->get(1));
        } else {
            $this->assertParameterEqual($expectedParameters[0], $expectedPrices["price"], $parameters->get(0));
        }
    }

    public function applyToQueryDataProvider()
    {
        return [
            [
                "options"            => [
                    "type"   => "between",
                    "price1" => 1.22,
                    "price2" => 2.33,
                ],
                "expectedDql"        => "SELECT v FROM Gyman\Bundle\VouchersBundle\Entity\Voucher v WHERE v.price > :price1 AND v.price < :price2",
                "parameterCount"     => 2,
                "expectedParameters" => [
                    "price1",
                    "price2",
                ],
                "expectedPrices"     =>
                [
                    "price1" => 1.22,
                    "price2" => 2.33,
                ]
            ],
            [
                "options"            => [
                    "type"   => "eq",
                    "price1" => 1.22,
                ],
                "expectedDql"        => "SELECT v FROM Gyman\Bundle\VouchersBundle\Entity\Voucher v WHERE v.price = :price",
                "parameterCount"     => 1,
                "expectedParameters" => [
                    "price",
                ],
                "expectedPrices"     =>
                [
                    "price" => 1.22,
                ]
            ],
            [
                "options"            => [
                    "type"   => "lt",
                    "price1" => 1.22,
                ],
                "expectedDql"        => "SELECT v FROM Gyman\Bundle\VouchersBundle\Entity\Voucher v WHERE v.price < :price",
                "parameterCount"     => 1,
                "expectedParameters" => [
                    "price",
                ],
                "expectedPrices"     =>
                [
                    "price" => 1.22,
                ]
            ],
            [
                "options"            => [
                    "type"   => "gt",
                    "price1" => 1.22,
                ],
                "expectedDql"        => "SELECT v FROM Gyman\Bundle\VouchersBundle\Entity\Voucher v WHERE v.price > :price",
                "parameterCount"     => 1,
                "expectedParameters" => [
                    "price",
                ],
                "expectedPrices"     =>
                [
                    "price" => 1.22,
                ]
            ],
        ];
    }
}
