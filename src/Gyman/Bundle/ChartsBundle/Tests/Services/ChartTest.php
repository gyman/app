<?php

namespace Gyman\Bundle\ChartsBundle\Tests\Services;

use DateTime;
use Doctrine\ORM\EntityRepository;
use Gyman\Bundle\ChartsBundle\Services\Chart;
use Gyman\Bundle\TestBundle\Tests\BaseTest;

class ChartTest extends BaseTest
{
    /**
     * @dataProvider prepareResultsDataProvider
     */
    public function testPrepareResults($dataset, $expected)
    {
        $chart = new Chart();
        $chart->dateFormat = 'Y-m-d';

        $result = $chart->prepareResults($dataset);

        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider getEntriesByActivityDataProvider
     */
    public function testGetEntriesByActivity($dataset, Chart $expected, $days, $endDate)
    {
        $this->dataset = $dataset;

        $chart = new Chart();
        $chart->dateFormat = 'Y-m-d';

        $chart->setEntityManager(
            $this->getEntityManagerMock(
                $this->getEntryRepositoryMock()
            )
        );

        $chart->getEntriesByActivity($endDate, $days);

        $this->assertEquals($expected->series, $chart->series);
        $this->assertEquals($expected->categories, $chart->categories);
    }

    /**
     * @dataProvider getActivityByFrequencyDataProvider
     */
    public function testGetActivityByFrequency($dataset, Chart $expected)
    {
        $this->dataset = $dataset;

        $chart = new Chart();
        $chart->setEntityManager(
            $this->getEntityManagerMock(
                $this->getActivityRepositoryMock()
            )
        );

        $chart->getActivityByFrequency();

        $this->assertEquals($expected->series, $chart->series);
        $this->assertEquals($expected->categories, $chart->categories);
    }

    public function getActivityByFrequencyDataProvider()
    {
        return [
            ['dataset'     => [], 'expected' => new Chart([[
                    'type' => 'pie',
                    'name' => 'abc',
                    'data' => [],
                    ]], [])],
            [
                'dataset'  => [
                    [
                        'name' => 'name1',
                        'cnt'  => 33,
                    ],
                    [
                        'name' => 'name2',
                        'cnt'  => 55,
                    ],
                    [
                        'name' => 'name3',
                        'cnt'  => 24,
                    ],
                ],
                'expected' => new Chart([[
                    'type' => 'pie',
                    'name' => 'abc',
                    'data' => [
                        ['name1', 33],
                        ['name2', 55],
                        ['name3', 24],
                    ],
                    ]], []),
            ],
        ];
    }

    public function getEntriesByActivityDataProvider()
    {
        return [
            [
                'dataset'  => [],
                'expected' => new Chart(
                    [],
                    [
                        '2014-05-01',
                        '2014-05-02',
                        '2014-05-03',
                        '2014-05-04',
                        '2014-05-05',
                        '2014-05-06',
                        '2014-05-07',
                        '2014-05-08',
                        '2014-05-09',
                        '2014-05-10',
                        '2014-05-11',
                        '2014-05-12',
                        '2014-05-13',
                        '2014-05-14',
                        '2014-05-15',
                        '2014-05-16',
                        '2014-05-17',
                        '2014-05-18',
                        '2014-05-19',
                        '2014-05-20',
                        '2014-05-21',
                        '2014-05-22',
                        '2014-05-23',
                        '2014-05-24',
                        '2014-05-25',
                        '2014-05-26',
                        '2014-05-27',
                        '2014-05-28',
                        '2014-05-29',
                        '2014-05-30',
                        '2014-05-31',
                    ],
                    'Y-m-d'
                ),
                'days'     => 30,
                'endDate'  => new DateTime('2014-05-31'),
            ],
            [
                'dataset'  => [
                    [
                        'name' => 'name1',
                        'cnt'  => '33',
                        'date' => '2014-05-01',
                    ],
                    [
                        'name' => 'name2',
                        'cnt'  => '33',
                        'date' => '2014-05-01',
                    ],
                    [
                        'name' => 'name3',
                        'cnt'  => '33',
                        'date' => '2014-05-01',
                    ],
                    [
                        'name' => 'name1',
                        'cnt'  => '30',
                        'date' => '2014-05-02',
                    ],
                    [
                        'name' => 'name2',
                        'cnt'  => '20',
                        'date' => '2014-05-05',
                    ],
                    [
                        'name' => 'name3',
                        'cnt'  => '10',
                        'date' => '2014-05-05',
                    ],
                    [
                        'name' => 'name3',
                        'cnt'  => '10',
                        'date' => '2014-05-07',
                    ],
                    [
                        'name' => 'name1',
                        'cnt'  => '15',
                        'date' => '2014-05-31',
                    ],
                    [
                        'name' => 'name2',
                        'cnt'  => '15',
                        'date' => '2014-05-31',
                    ],
                    [
                        'name' => 'name3',
                        'cnt'  => '15',
                        'date' => '2014-05-31',
                    ],
                ],
                'expected' => new Chart([
                    ['name' => 'name1', 'data' => [
                            33, 30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                            0, 0, 0, 0, 0, 0, 15,
                        ]],
                    ['name' => 'name2', 'data' => [
                            33, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                            0, 0, 0, 0, 0, 0, 15,
                        ]],
                    ['name' => 'name3', 'data' => [
                            33, 0, 0, 0, 10, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                            0, 0, 0, 0, 0, 0, 15,
                        ]],
                    ], [
                    '2014-05-01',
                    '2014-05-02',
                    '2014-05-03',
                    '2014-05-04',
                    '2014-05-05',
                    '2014-05-06',
                    '2014-05-07',
                    '2014-05-08',
                    '2014-05-09',
                    '2014-05-10',
                    '2014-05-11',
                    '2014-05-12',
                    '2014-05-13',
                    '2014-05-14',
                    '2014-05-15',
                    '2014-05-16',
                    '2014-05-17',
                    '2014-05-18',
                    '2014-05-19',
                    '2014-05-20',
                    '2014-05-21',
                    '2014-05-22',
                    '2014-05-23',
                    '2014-05-24',
                    '2014-05-25',
                    '2014-05-26',
                    '2014-05-27',
                    '2014-05-28',
                    '2014-05-29',
                    '2014-05-30',
                    '2014-05-31',
                    ], 'Y-m-d'),
                'days'     => 30,
                'endDate'  => new DateTime('2014-05-31'),
            ],
        ];
    }

    private function getEntityManagerMock(EntityRepository $repositoryMock)
    {
        $mock = $this->getMockBuilder("Doctrine\ORM\EntityManager")
            ->disableOriginalConstructor()
            ->getMock();

        $mock->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($repositoryMock));

        return $mock;
    }

    private function getEntryRepositoryMock()
    {
        $mock = $this->getMockBuilder("Gyman\Bundle\EntriesBundle\Entity\EntryRepository")
            ->disableOriginalConstructor()
            ->getMock();

        $mock->expects($this->once())
            ->method('getCountByActivities')
            ->will($this->returnValue($this->dataset));

        return $mock;
    }

    private function getActivityRepositoryMock()
    {
        $mock = $this->getMockBuilder("Gyman\Bundle\ScheduleBundle\Entity\ActivityRepository")
            ->disableOriginalConstructor()
            ->getMock();

        $mock->expects($this->once())
            ->method('getCountByActivities')
            ->will($this->returnValue($this->dataset));

        return $mock;
    }

    public function prepareResultsDataProvider()
    {
        return [
            [
                'dataset'  => [],
                'expected' => [],
            ],
            [
                'dataset'  => [
                    [
                        'date' => '2014-01-01',
                        'name' => 'name1',
                        'cnt'  => '33',
                    ],
                    [
                        'date' => '2014-01-02',
                        'name' => 'name2',
                        'cnt'  => '33',
                    ],
                    [
                        'date' => '2014-01-03',
                        'name' => 'name1',
                        'cnt'  => '33',
                    ],
                    [
                        'date' => '2014-01-03',
                        'name' => 'name3',
                        'cnt'  => '33',
                    ],
                ],
                'expected' => [
                    'name1' => [
                        '2014-01-01' => '33',
                        '2014-01-03' => '33',
                    ],
                    'name2' => [
                        '2014-01-02' => '33',
                    ],
                    'name3' => [
                        '2014-01-03' => '33',
                    ],
                ],
            ],
        ];
    }
}
