<?php
namespace Gyman\Bundle\DashboardBundle\Controller;

use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Gyman\Domain\Voucher;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
            "currentVoucher" => $currentVoucher,
            "lastEntry" => $lastEntry
        ];
    }
}
