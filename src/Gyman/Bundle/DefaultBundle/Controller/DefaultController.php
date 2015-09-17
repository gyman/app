<?php
namespace Gyman\Bundle\DefaultBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="_default_index")
     */
    public function indexAction()
    {
        return $this->forward('MembersBundle:Members:index');
    }
}
