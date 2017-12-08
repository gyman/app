<?php
namespace Gyman\Bundle\ReportsBundle\Generator;

use Carbon\Carbon;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\ReportsBundle\Form\DateFilter;
use Symfony\Component\Form\Form;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class ReportsGenerator
 * @package Gyman\Bundle\ReportsBundle\Generator
 */
class ReportsGenerator
{
    /** @var ArrayCollection */
    private $strategies;

    /** @var RouterInterface */
    private $router;

    /**
     * ReportsGenerator constructor.
     */
    public function __construct($router)
    {
        $this->strategies = new ArrayCollection();
        $this->router = $router;
    }

    /**
     * @param $name
     * @param StrategyInterface $strategy
     */
    public function addStrategy($name, StrategyInterface $strategy){
        $this->strategies->set($name, $strategy);
    }

    /**
     * @param Form $form
     * @return array
     */
    public function links(Form $form)
    {
        $router = $this->router;

        $getLink = function (DateTime $startDate, DateTime $endDate) use ($form, $router) {
            return $router->generate("gyman_reports_index", [
                $form->getName() => [
                    "startDate" => $startDate->format("d.m.Y"),
                    "endDate" => $endDate->format("d.m.Y"),
                    "strategy" => $form->getData()->strategy,
                    "submit" => null
                ]
            ]);
        };

        return [
            'todayLink' => $getLink(Carbon::parse("today"), Carbon::parse("today")),
            'yesterdayLink' => $getLink(Carbon::parse("yesterday"), Carbon::parse("yesterday")),
            'thisWeekLink' => $getLink(Carbon::parse("this week"), Carbon::parse("this week +6 days")),
            'lastWeekLink' => $getLink(Carbon::parse("previous week"), Carbon::parse("previous week +6 days")),
            'thisMonthLink' => $getLink(Carbon::parse("first day of this month"), Carbon::parse("last day of this month")),
            'lastMonthLink' => $getLink(Carbon::parse("first day of last month"), Carbon::parse("last day of last month")),
        ];
    }

    /**
     * @param $name
     * @return mixed|null
     * @throws \Exception
     */
    private function chooseStrategy($name)
    {
        foreach($this->strategies as $strategy) {
            if($strategy->getName() === $name) {
                return $strategy;
            }
        }

        throw new \Exception(sprintf(
            "Report generating strategy '%s' not added to strategies chain!",
            $name
        ));
    }

    /**
     * @param DateFilter $filter
     * @return mixed
     * @throws \Exception
     */
    public function result(DateFilter $filter)
    {
        $strategy = $this->chooseStrategy($filter->strategy);
        return $strategy->result($filter);
    }
}
