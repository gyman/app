<?php

namespace Gyman\Bundle\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \DateTime;
use Ob\HighchartsBundle\Highcharts\Highchart;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="_dashboard_index")
     * @Template("DashboardBundle:Default:index.html.twig")
     * @todo Przenieść do osobnego bundle'a
     */
    public function indexAction()
    {
//        $pinnedFilters = $this->get("filter_repository")->getPinnedFilters();

        $occurences = $this->get("schedule")->getOccurencesForDashboard(new DateTime());

//        $popularChart = $this->get("chart")->getMostPopularChart(new Highchart());
//        $frequencyChart = $this->get("chart")->getFrequencyChart(new Highchart(), new DateTime());

        return array(
            "date"            => new DateTime(),
//            "filters"         => $pinnedFilters,
            "occurences"      => $occurences,
//            "popularityChart" => $popularChart,
//            "frequencyChart"  => $frequencyChart
        );
    }

    /**
     * @Route("/dashboard/activities/{date}", name="_dashboard_getActivities")
     */
    public function getActivitiesAction(DateTime $date)
    {
        $occurences = $this->get("schedule")->getOccurencesForDashboard($date);

        return new Response(
            $this->renderView(
                "DashboardBundle:Default:activities.html.twig",
                ["date"       => $date, "occurences" => $occurences]
            ),
            200
        );
    }
}
