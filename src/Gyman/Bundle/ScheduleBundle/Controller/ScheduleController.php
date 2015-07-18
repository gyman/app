<?php

namespace Gyman\Bundle\ScheduleBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ScheduleController extends Controller
{
    /**
     * @Route("/calendar",name="_schedule_calendar")
     * @Template()
     */
    public function calendarAction()
    {
        return [];
    }
}
