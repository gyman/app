<?php
namespace Gyman\Bundle\DashboardBundle\Controller;

use Carbon\Carbon;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Application\Command\UpdateOccurrenceDetailsCommand;
use Gyman\Bundle\AppBundle\Form\SearchType;
use Gyman\Bundle\AppBundle\Form\UpdateOccurrenceDetailsType;
use Gyman\Bundle\AppBundle\Repository\OccurrenceRepository;
use Gyman\Domain\Calendar\Event\Occurrence;
use Doctrine\Common\Collections\Criteria;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Gyman\Application\Command\SearchMemberCommand;
use Gyman\Domain\MemberView;
use Gyman\Domain\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package Gyman\Bundle\DashboardBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/dashboard/activities/{date}", name="gyman_dashboard_getActivities", options={"expose"=true})
     */
    public function getActivitiesAction(DateTime $date) : Response
    {
        return new Response($this->renderView('DashboardBundle:Default:activities.html.twig', [
            'date'        => $date,
            'occurrences' => $this->get("gyman.occurrences.query")->getOccurrencesForDay($date)
        ]));
    }

    /**
     * @Route("/activity/{id}", name="gyman_dashboard_listClassMembers")
     * @ParamConverter("occurrence", class="Gyman\Domain\Calendar\Event\Occurrence", options={"repository_method" = "findOneById"})
     */
    public function listClassMembersAction(Occurrence $occurrence) : Response
    {
        $memberQuery = $this->get("gyman.members.query");

        $allMembers = $memberQuery->findAll();

        $membersThatEntered = $memberQuery->findMembersThatEntered($occurrence);

        return $this->render("DashboardBundle:Default:listClassMembers.html.twig", [
            "occurrence" => $occurrence,
            "membersThatEntered"   =>  $membersThatEntered,
            "allMembers" => $allMembers
        ]);
    }
}
