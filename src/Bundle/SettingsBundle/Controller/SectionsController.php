<?php

namespace Gyman\Bundle\SettingsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SectionsController extends Controller
{
    /**
     * @Route("/sections")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $sections = $this->get('gyman.repository.section')->findAll();

        return $this->render('GymanSettingsBundle:Default:sections.html.twig', [
            "sections" => $sections
        ]);
    }
}
