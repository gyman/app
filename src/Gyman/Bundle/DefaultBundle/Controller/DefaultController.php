<?php

namespace Gyman\Bundle\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="_default_index")
     */
    public function indexAction()
    {
        return $this->forward("MembersBundle:Default:index");
    }
}
