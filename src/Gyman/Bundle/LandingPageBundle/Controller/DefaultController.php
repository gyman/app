<?php

namespace Gyman\Bundle\LandingPageBundle\Controller;

use Gyman\Application\Command\CreateClubCommand;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="gyman_landing_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        $command = new CreateClubCommand();
        $form = $this->createForm('create_club', $command);

        return $this->render('GymanLandingPageBundle:Default:index.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
