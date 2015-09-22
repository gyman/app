<?php
namespace Dende\Filters\Tests\Filters;

use DateTime;
use Gyman\Bundle\FiltersBundle\Filters\EntryDate;
use Gyman\Bundle\TestBundle\Tests\BaseTest;

class EntryDateTest extends BaseTest
{
    /**
     * @dataProvider applyOneDateDataProvider
     */
    public function testApplyOneDate($options, $expectedDql, $expectedDates, $expectedParameters)
    {
        $queryBuilder = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('EntriesBundle:Entry')
            ->createQueryBuilder('e');

        $entryDateFilter = new EntryDate();
        $entryDateFilter->setOptions($options);
        $entryDateFilter->apply($queryBuilder);

        $query = $queryBuilder->getQuery();

        $dql = $query->getDQL();

        $this->assertEquals($expectedDql, $dql);

        $parameters = $query->getParameters();

        $this->assertEquals($parameters->count(), 1);
        $this->assertParameterEqual($expectedParameters[0], $expectedDates['date1'], $parameters->get(0));
    }

    /**
     * @dataProvider applyTwoDatesDataProvider
     */
    public function testApplyTwoDates($options, $expectedDql, $expectedDates, $expectedParameters)
    {
        $queryBuilder = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('EntriesBundle:Entry')
            ->createQueryBuilder('e');

        $entryDateFilter = new EntryDate();
        $entryDateFilter->setOptions($options);
        $entryDateFilter->apply($queryBuilder);

        $query = $queryBuilder->getQuery();

        $dql = $query->getDQL();

        $this->assertEquals($expectedDql, $dql);

        $parameters = $query->getParameters();

        $this->assertEquals($parameters->count(), 2);
        $this->assertParameterEqual($expectedParameters[0], $expectedDates['date1'], $parameters->get(0));
        $this->assertParameterEqual($expectedParameters[1], $expectedDates['date2'], $parameters->get(1));
    }

    /**
     * @dataProvider applyNoDatesDataProvider
     */
    public function testApplyNoDates($options, $expectedDql, $expectedDates, $expectedParameters)
    {
        $queryBuilder = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('EntriesBundle:Entry')
            ->createQueryBuilder('e');

        $entryDateFilter = new EntryDate();
        $entryDateFilter->setOptions($options);
        $entryDateFilter->apply($queryBuilder);

        $query = $queryBuilder->getQuery();

        $dql = $query->getDQL();

        $this->assertEquals($expectedDql, $dql);

        $parameters = $query->getParameters();

        $this->assertEquals($parameters->count(), 2);
        $this->assertParameterEqual($expectedParameters[0], $expectedDates['date1'], $parameters->get(0));
        $this->assertParameterEqual($expectedParameters[1], $expectedDates['date2'], $parameters->get(1));
    }

    public function applyOneDateDataProvider()
    {
        return [

            [
                'options'            => [
                    'date1' => '2010-10-10 12:00:00',
                    'type'  => 'lt',
                ],
                'expectedDql'        => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created < :date",
                'expectedDates'      => [
                    'date1' => '2010-10-10 00:00:00',
                ],
                'expectedParameters' => [
                    'date',
                ],
            ],
            [
                'options'            => [
                    'date1' => '2010-10-10 12:00:00',
                    'type'  => 'gt',
                ],
                'expectedDql'        => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created > :date",
                'expectedDates'      => [
                    'date1' => '2010-10-10 23:59:59',
                ],
                'expectedParameters' => [
                    'date',
                ],
            ],
        ];
    }

    public function applyTwoDatesDataProvider()
    {
        return [
            [
                'options'            => [
                    'date1' => new DateTime('2010-10-10 12:00:00'),
                    'type'  => 'eq',
                ],
                'expectedDql'        => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created >= :dateFrom AND e.created <= :dateTo",
                'expectedDates'      => [
                    'date1' => '2010-10-10 00:00:00',
                    'date2' => '2010-10-10 23:59:59',
                ],
                'expectedParameters' => [
                    'dateFrom',
                    'dateTo',
                ],
            ],
            [
                'options'            => [
                    'date1' => '2010-10-10 12:00:00',
                    'date2' => '2010-10-15 12:00:00',
                    'type'  => 'notBetween',
                ],
                'expectedDql'        => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created <= :dateFrom AND e.created >= :dateTo",
                'expectedDates'      => [
                    'date1' => '2010-10-10 00:00:00',
                    'date2' => '2010-10-15 23:59:59',
                ],
                'expectedParameters' => [
                    'dateFrom',
                    'dateTo',
                ],
            ],
            [
                'options'            => [
                    'date1' => '2010-10-10 12:00:00',
                    'date2' => '2010-10-15 12:00:00',
                    'type'  => 'between',
                ],
                'expectedDql'        => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created >= :dateFrom AND e.created <= :dateTo",
                'expectedDates'      => [
                    'date1' => '2010-10-10 00:00:00',
                    'date2' => '2010-10-15 23:59:59',
                ],
                'expectedParameters' => [
                    'dateFrom',
                    'dateTo',
                ],
            ],
        ];
    }

    public function applyNoDatesDataProvider()
    {
        return [
            [
                'options'            => [
                    'type' => 'yesterday',
                ],
                'expectedDql'        => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created >= :dateFrom AND e.created <= :dateTo",
                'expectedDates'      => [
                    'date1' => (new DateTime('yesterday 00:00:00'))->format('Y-m-d H:i:s'),
                    'date2' => (new DateTime('yesterday 23:59:59'))->format('Y-m-d H:i:s'),
                ],
                'expectedParameters' => [
                    'dateFrom',
                    'dateTo',
                ],
            ],
            [
                'options'            => [
                    'type' => 'today',
                ],
                'expectedDql'        => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created >= :dateFrom AND e.created <= :dateTo",
                'expectedDates'      => [
                    'date1' => (new DateTime('today 00:00:00'))->format('Y-m-d H:i:s'),
                    'date2' => (new DateTime('today 23:59:59'))->format('Y-m-d H:i:s'),
                ],
                'expectedParameters' => [
                    'dateFrom',
                    'dateTo',
                ],
            ],
            [
                'options'       => [
                    'type' => 'thisWeek',
                ],
                'expectedDql'   => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created >= :dateFrom AND e.created <= :dateTo",
                'expectedDates' => [
                    'date1' => call_user_func(function () {
                        $Y = date('Y');
                        $W = (int) date('W');

                        $first = date('Y-m-d', strtotime(sprintf('%s-W%02d.-1', $Y, $W)));
                        $firstDayOfWeek = new DateTime($first);

                        return $firstDayOfWeek->format('Y-m-d 00:00:00');
                    }),
                    'date2'         => call_user_func(function () {
                        $Y = date('Y');
                        $W = (int) date('W');

                        $last = date('Y-m-d', strtotime(sprintf('%s-W%02d-0', $Y, $W + 1)));

                        $lastDayOfWeek = new DateTime($last);

                        return $lastDayOfWeek->format('Y-m-d 23:59:59');
                    }),
                    ],
                    'expectedParameters' => [
                    'dateFrom',
                    'dateTo',
                    ],
                    ],
                    [
                    'options'       => [
                    'type' => 'lastWeek',
                    ],
                    'expectedDql'   => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created >= :dateFrom AND e.created <= :dateTo",
                    'expectedDates' => [
                    'date1' => call_user_func(function () {
                        $Y = date('Y');
                        $W = (int) date('W') - 1;

                        $first = date('Y-m-d', strtotime(sprintf('%s-W%02d.-1', $Y, $W)));
                        $firstDayOfWeek = new DateTime($first);

                        return $firstDayOfWeek->format('Y-m-d 00:00:00');
                    }),
                    'date2'         => call_user_func(function () {
                        $Y = date('Y');
                        $W = (int) date('W') - 1;

                        $last = date('Y-m-d', strtotime(sprintf('%s-W%02d-0', $Y, $W + 1)));

                        $lastDayOfWeek = new DateTime($last);

                        return $lastDayOfWeek->format('Y-m-d 23:59:59');
                    }),
                    ],
                    'expectedParameters' => [
                    'dateFrom',
                    'dateTo',
                    ],
                    ],
                    [
                    'options'            => [
                    'type' => 'thisMonth',
                    ],
                    'expectedDql'        => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created >= :dateFrom AND e.created <= :dateTo",
                    'expectedDates'      => [
                    'date1' => (new DateTime('first day of this month'))->format('Y-m-d 00:00:00'),
                    'date2' => (new DateTime('last day of this month'))->format('Y-m-d 23:59:59'),
                    ],
                    'expectedParameters' => [
                    'dateFrom',
                    'dateTo',
                    ],
                    ],
                    [
                    'options'            => [
                    'type' => 'lastMonth',
                    ],
                    'expectedDql'        => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created >= :dateFrom AND e.created <= :dateTo",
                    'expectedDates'      => [
                    'date1' => (new DateTime('first day of previous month'))->format('Y-m-d 00:00:00'),
                    'date2' => (new DateTime('last day of previous month'))->format('Y-m-d 23:59:59'),
                    ],
                    'expectedParameters' => [
                    'dateFrom',
                    'dateTo',
                    ],
                    ],
                    [
                    'options'            => [
                    'type' => 'thisYear',
                    ],
                    'expectedDql'        => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created >= :dateFrom AND e.created <= :dateTo",
                    'expectedDates'      => [
                    'date1' => (new DateTime(date('Y-01-01')))->format('Y-m-d 00:00:00'),
                    'date2' => (new DateTime(date('Y-12-31')))->format('Y-m-d 23:59:59'),
                    ],
                    'expectedParameters' => [
                    'dateFrom',
                    'dateTo',
                    ],
                    ],
                    [
                    'options'            => [
                    'type' => 'lastYear',
                    ],
                    'expectedDql'        => "SELECT e FROM Gyman\Bundle\EntriesBundle\Entity\Entry e WHERE e.created >= :dateFrom AND e.created <= :dateTo",
                    'expectedDates'      => [
                    'date1' => (new DateTime(date('Y-01-01', strtotime('-1 year'))))->format('Y-m-d 00:00:00'),
                    'date2' => (new DateTime(date('Y-12-31', strtotime('-1 year'))))->format('Y-m-d 23:59:59'),
                    ],
                    'expectedParameters' => [
                    'dateFrom',
                    'dateTo',
                    ],
                    ],
                    ];
    }
}
