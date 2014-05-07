<?php

namespace Dende\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \DateTime;

class DefaultController extends Controller {

    /**
     * @Route("/", name="_dashboard_index")
     * @Template("DashboardBundle:Default:index.html.twig")
     * @todo Przenieść do osobnego bundle'a
     */
    public function indexAction() {
        $pinnedFilters = $this->get("filter_repository")->getPinnedFilters();
        $events = $this->get("schedule")->getEventsForDashboard(new DateTime);
        $popularActivities = $this->get("activity_repository")->getPopularity();
        
        return array(
            "date"    => new DateTime,
            "filters" => $pinnedFilters,
            "events"  => $events,
            "popularActivities" => $popularActivities
        );
    }

    /**
     * @Route("/dashboard/activities/{date}", name="_dashboard_getActivities")
     */
    public function getActivitiesAction(DateTime $date) {
        $events = $this->get("schedule")->getEventsForDashboard($date);

        $response = new Response;

        return $response->setContent(
                $this->renderView("DashboardBundle:Default:activities.html.twig", array(
                    "date"   => $date,
                    "events" => $events
                    )
                )
        );
    }
}
