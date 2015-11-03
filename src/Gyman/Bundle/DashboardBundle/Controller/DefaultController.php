<?php
namespace Gyman\Bundle\DashboardBundle\Controller;

use Carbon\Carbon;
use DateTime;
use Dende\Calendar\Domain\Calendar\Event\Occurrence;
use Ob\HighchartsBundle\Highcharts\Highchart;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="_dashboard_index")
     * @Template("DashboardBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        //        $pinnedFilters = $this->get("filter_repository")->getPinnedFilters();

//        $occurrences = $this->get('schedule')->getOccurrencesForDashboard(new DateTime());

//        $popularChart = $this->get("chart")->getMostPopularChart(new Highchart());
//        $frequencyChart = $this->get("chart")->getFrequencyChart(new Highchart(), new DateTime());

        return [
            'date'            => new DateTime(),
//            "filters"         => $pinnedFilters,
            'occurrences'      => [], // $occurrences,
//            "popularityChart" => $popularChart,
//            "frequencyChart"  => $frequencyChart
        ];
    }

    /**
     * @Route("/dashboard/activities/{date}", name="_dashboard_getActivities")
     */
    public function getActivitiesAction(DateTime $date)
    {
        /** @var Carbon $startDate */
        $startDate = Carbon::instance($date)->setTime(0,0,0);

        /** @var Carbon $endDate */
        $endDate = Carbon::instance($date)->setTime(0,0,0)->addDays(1);

        /** @var Occurrence[] $occurrences */
        $occurrences = $this->get('dende_calendar.occurrences_repository')->findByPeriod($startDate, $endDate);

        return new Response($this->renderView('DashboardBundle:Default:activities.html.twig', [
                    'date'        => $date,
                    'occurrences' => $occurrences
        ]));
    }
}
