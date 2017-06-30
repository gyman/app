<?php
namespace Gyman\Bundle\DashboardBundle\Controller;

use Carbon\Carbon;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\AppBundle\Repository\OccurrenceRepository;
use Gyman\Domain\Calendar\Event\Occurrence;
use Doctrine\Common\Collections\Criteria;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Gyman\Application\Command\SearchMemberCommand;
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
     * @Route("/", name="_dashboard_index")
     * @Template("DashboardBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
//        $pinnedFilters = $this->get("filter_repository")->getPinnedFilters();

//        $occurrences = $this->get('schedule')->getOccurrencesForDashboard(new DateTime());

//        $popularChart = $this->get("chart")->getMostPopularChart(new Highchart());
//        $frequencyChart = $this->get("chart")->getFrequencyChart(new Highchart(), new DateTime());

        $date = new DateTime();

        $searchForm = $this->createForm('gyman_member_search_form', new SearchMemberCommand(), [
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
     * @Route("/dashboard/activities/{date}", name="_dashboard_getActivities")
     */
    public function getActivitiesAction(DateTime $date)
    {
        return new Response($this->renderView('DashboardBundle:Default:activities.html.twig', [
                    'date'        => $date,
                    'occurrences' => $this->getOccurrencesForDay($date)
        ]));
    }

    /**
     * @Route("/activity/{id}", name="dashboard_list_class_members")
     * @ParamConverter("occurrence", class="Gyman\Domain\Calendar\Event\Occurrence", options={"repository_method" = "findOneById"})
     * @Template("DashboardBundle:Default:listClassMembers.html.twig")
     * @param Occurrence $occurrence
     * @return array
     */
    public function listClassMembersAction(Occurrence $occurrence)
    {
        $memberRepository = $this->get("gyman.members.repository");

        $criteria = Criteria::create()
            ->where(Criteria::expr()->neq("currentVoucher", null))
            ->orderBy([
                "currentVoucher" => "DESC",
                "details.lastname" => "ASC",
                "details.firstname" => "ASC"
            ])
        ;

        $allMembers = $memberRepository->matching($criteria)->toArray();

        $entries = $occurrence->entries();

        $usedMembersIds = array_map(function (Entry $entry) {
            return $entry->member()->id();
        }, $entries->toArray());

        if (count($entries) > 0) {
            $members = array_filter($allMembers, function (Member $member) use ($usedMembersIds) {
                return !in_array($member->id(), $usedMembersIds) && (is_null($member->lastEntry()) || !is_null($member->lastEntry()->endDate()));
            });
        } else {
            $members = $allMembers;
        }

        return [
            "entries"   =>  $entries,
            "occurrence" => $occurrence,
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
