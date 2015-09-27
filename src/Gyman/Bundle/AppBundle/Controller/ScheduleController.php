<?php
namespace Gyman\Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ScheduleController
 * @package Gyman\Bundle\AppBundle\Controller
 * @Route("/schedule")
 */
class ScheduleController extends Controller
{
    /**
     * @Route("/calendar", name="gyman_schedule_index")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }
}
