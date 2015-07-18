<?php

namespace Gyman\Bundle\ChartsBundle\Services;

use DateTime;
use Doctrine\ORM\EntityManager;
use Ob\HighchartsBundle\Highcharts\Highchart;

class Chart
{
    public $series = [];
    public $categories = [];
    public $dateFormat = 'd.m';

    /**
     *
     * @param array $series
     * @param array $categories
     * @param array $dateFormat
     */
    public function __construct($series = [], $categories = [], $dateFormat = 'd.m')
    {
        $this->series = $series;
        $this->categories = $categories;
        $this->dateFormat = $dateFormat;
    }

    /**
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function getEntityManager()
    {
        return $this->entityManager;
    }

    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    }

    /**
     *
     * @param  DateTime $endDate
     * @param  integer  $daysBack
     * @return array
     */
    public function getEntriesByActivity(DateTime $endDate, $daysBack = 30)
    {
        $this->series = [];
        $this->categories = [];

        $entryRepository = $this->entityManager
            ->getRepository('EntriesBundle:Entry');

        $startDate = clone($endDate);
        $startDate->modify(sprintf('%d days', abs($daysBack) * -1));

        $result = $entryRepository->getCountByActivities($startDate, $endDate);

        $preparedResult = $this->prepareResults($result);
        $activitiesNames = array_keys($preparedResult);
        $endDate->modify('+1 day');

        $tmpStart = clone($startDate);

        while ($tmpStart < $endDate) {
            $date = $tmpStart->format($this->dateFormat);
            $this->categories[] = $date;
            $tmpStart->modify('+1 day');
        }

        foreach ($activitiesNames as $name) {
            $serie = [];

            foreach ($this->categories as $date) {
                if (isset($preparedResult[$name][$date])) {
                    $value = $preparedResult[$name][$date];
                } else {
                    $value = 0;
                }

                $serie[] = $value;
            }

            $this->series[] = ['name' => $name, 'data' => $serie];
        }

        return $this;
    }

    public function getActivityByFrequency()
    {
        $this->series = [];
        $this->categories = [];

        $activityRepository = $this->entityManager
            ->getRepository('ScheduleBundle:Activity');

        $data = $activityRepository->getCountByActivities();

        $tmp = [];

        foreach ($data as $activity) {
            $tmp[] = [
                $activity['name'],
                (int) $activity['cnt'],
            ];
        }

        $this->series = [[
            'type' => 'pie',
            'name' => 'abc',
            'data' => $tmp,
        ]];

        return $this;
    }

    /**
     * Transforms array from db to date-keyed array
     * @param  array $array
     * @return array
     */
    public function prepareResults(array $array)
    {
        $series = [];

        if (count($array) > 0) {
            foreach ($array as $item) {
                $date = date($this->dateFormat, strtotime($item['date']));
                $name = trim($item['name']);
                $count = (int) $item['cnt'];

                $series[$name][$date] = $count;
            }
        }

        return $series;
    }

    /**
     *
     * @param  Highchart $frequencyChart
     * @param  DateTime  $startDate
     * @return Highchart
     */
    public function getFrequencyChart(Highchart $frequencyChart, DateTime $startDate)
    {
        $data = $this->getEntriesByActivity($startDate);

        $frequencyChart->chart->renderTo('frequencyChart');
        $frequencyChart->chart->type('area');
        $frequencyChart->title->text('Frekwencja w ciągu ostatnich 30 dni');
        $frequencyChart->xAxis->title(['text' => null]);
        $frequencyChart->xAxis->categories($data->categories);
        $frequencyChart->yAxis->title(['text' => 'liczba wejść']);
        $frequencyChart->plotOptions->area([
            'stacking' => 'normal',
        ]);
        $frequencyChart->series($data->series);

        return $frequencyChart;
    }

    public function getMostPopularChart(Highchart $popularChart)
    {
        $data = $this->getActivityByFrequency();

        $popularChart->chart->renderTo('popularityChart');
        $popularChart->title->text(null);
        $popularChart->plotOptions->pie([
            'allowPointSelect' => true,
            'cursor'           => 'pointer',
            'dataLabels'       => ['enabled' => true],
            'showInLegend'     => false,
        ]);
        $popularChart->series($data->series);

        return $popularChart;
    }
}
