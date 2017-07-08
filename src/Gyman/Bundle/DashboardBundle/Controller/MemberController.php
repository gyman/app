<?php
namespace Gyman\Bundle\DashboardBundle\Controller;

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

        return [];
    }
}
