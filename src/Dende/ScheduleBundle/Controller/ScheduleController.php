<?php

namespace Dende\ScheduleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class ScheduleController extends Controller {

    /**
     * @Route("/calendar",name="_schedule_calendar")
     * @Template()
     */
    public function indexAction() {
        return array();
    }


}
