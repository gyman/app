<?php

namespace Gyman\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/",
     *     name="gyman_admin_index",
     *     host="admin.{base_url}",
     *     defaults={"base_url"="%base_url%"},
     *     requirements={"base_url"="%base_url%"}
     * )
     */
    public function indexAction()
    {
        return $this->render('AdminBundle:Default:index.html.twig');
    }
}
