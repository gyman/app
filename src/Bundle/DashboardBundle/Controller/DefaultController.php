<?php
namespace Gyman\Bundle\DashboardBundle\Controller;

use Carbon\Carbon;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\AppBundle\Form\SearchType;
use Gyman\Bundle\AppBundle\Repository\OccurrenceRepository;
use Gyman\Domain\Calendar\Event\Occurrence;
use Doctrine\Common\Collections\Criteria;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Gyman\Application\Command\SearchMemberCommand;
use Gyman\Domain\MemberView;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package Gyman\Bundle\DashboardBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="gyman_dashboard_index")
     * @Template("DashboardBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        if ($this->isGranted('ROLE_MEMBER')) {
            return $this->redirectToRoute('gyman_dashboard_member_index');
        }

//        $pinnedFilters = $this->get("filter_repository")->getPinnedFilters();

//        $occurrences = $this->get('schedule')->getOccurrencesForDashboard(new DateTime());

//        $popularChart = $this->get("chart")->getMostPopularChart(new Highchart());
//        $frequencyChart = $this->get("chart")->getFrequencyChart(new Highchart(), new DateTime());

        $date = new DateTime();

        $searchForm = $this->createForm(SearchType::class, new SearchMemberCommand(), [
            "action" => $this->generateUrl("gyman_members_search")
        ]);

        return [
            'date'            => new DateTime(),
            'searchForm'      => $searchForm->createView(),
//            "filters"         => $pinnedFilters,
            'occurrences'      => $this->getOccurrencesForDay($date),
//            "popularityChart" => $popularChart,
//            "frequencyChart"  => $frequencyChart
        ];
    }

    /**
     * @Route("/dashboard/activities/{date}", name="gyman_dashboard_getActivities", options={"expose"=true})
     */
    public function getActivitiesAction(DateTime $date)
    {
        return new Response($this->renderView('DashboardBundle:Default:activities.html.twig', [
                    'date'        => $date,
                    'occurrences' => $this->getOccurrencesForDay($date)
        ]));
    }

    /**
     * @Route("/activity/{id}", name="gyman_dashboard_listClassMembers")
     * @ParamConverter("occurrence", class="Gyman\Domain\Calendar\Event\Occurrence", options={"repository_method" = "findOneById"})
     * @Template("DashboardBundle:Default:listClassMembers.html.twig")
     * @param Occurrence $occurrence
     * @return array
     */
    public function listClassMembersAction(Occurrence $occurrence)
    {
        $memberQuery = $this->get("gyman.members.query");

        $allMembers = $memberQuery->findAll();

        usort($allMembers, function(MemberView $a, MemberView $b) {
            if ($a->currentVoucherId() !== null) {
                return 1;
            }

            if ($b->currentVoucherId() !== null) {
                return -1;
            }

            return 0;

        });

        $membersThatEntered = $memberQuery->findMembersThatEntered($occurrence);

        if (count($membersThatEntered) > 0) {
            $members = array_filter($allMembers, function (MemberView $member) use ($membersThatEntered) {
                return !in_array($member, $membersThatEntered);
            });
        } else {
            $members = $allMembers;
        }

        return [
            "occurrence" => $occurrence,
            "membersThatEntered"   =>  $membersThatEntered,
            "allMembers" => $members,
        ];
    }

    /**
     * @param $date
     * @return Occurrence[]|ArrayCollection
     */
    private function getOccurrencesForDay($date)
    {
        /** @var Carbon $startDate */
        $startDate = Carbon::instance($date)->setTime(0, 0, 0);

        /** @var Carbon $endDate */
        $endDate = Carbon::instance($date)->setTime(0, 0, 0)->addDays(1);

        /** @var OccurrenceRepository $repository */
        $repository = $this->get('doctrine.orm.tenant_entity_manager')->getRepository(Occurrence::class);

        /** @var Occurrence[] $occurrences */
        $occurrences = $repository->findByPeriod($startDate, $endDate);

        return $occurrences;
    }
}
