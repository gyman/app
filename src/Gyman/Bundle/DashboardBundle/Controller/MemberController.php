<?php
namespace Gyman\Bundle\DashboardBundle\Controller;

use Carbon\Carbon;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Gyman\Domain\Voucher;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package Gyman\Bundle\DashboardBundle\Controller
 * @Route("/member")
 */
class MemberController extends Controller
{
    /**
     * @Route("/", name="gyman_dashboard_member_index")
     * @Template("DashboardBundle:Member:index.html.twig")
     */
    public function indexAction()
    {
        $this->denyAccessUnlessGranted("ROLE_MEMBER");

        /** @var Member $member */
        $member = $this->getUser()->member();
        /** @var Voucher $currentVoucher */
        $currentVoucher = $member->currentVoucher();
        /** @var Entry $lastEntry */
        $lastEntry = $member->lastEntry();

        return [
            "member" => $member,
            "entries" => $this->get("gyman.entries.query")->findLastByMember($member, 30),
            "currentVoucher" => $currentVoucher,
            "lastEntry" => $lastEntry
        ];
    }

    /**
     * @Route("/calendar", name="gyman_dashboard_member_calendar", options={"expose"=true})
     */
    public function getCalendarAction(Request $request){
        $start = Carbon::parse($request->get('start', 'this week'));
        $end = Carbon::parse($request->get('end', 'next week'));

        $events = $this->get('gyman.dashboard.members_query')->get($this->getUser()->member(), $start, $end);

        return new JsonResponse($events);
    }
}
