<?php

namespace Gyman\Bundle\ClubBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\ClubBundle\ClubsEvents;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Event\ClubCreatedEvent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/new", name="_club_new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $club = new Club();
        $club->setName('Jakiś klub na próbę');
        $club->setOwners(new ArrayCollection([$this->getUser()]));

        $em = $this->getDoctrine()->getEntityManagerForClass('ClubBundle:Club');
        $em->persist($club);
        $em->flush();

        $this->get('event_dispatcher')->dispatch(ClubsEvents::CREATED, new ClubCreatedEvent($club));
    }
}
