<?php

namespace Gyman\Bundle\ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Gyman\Bundle\MembersBundle\Entity\Member;

class MemberController extends FOSRestController
{
    public function getMembersAction()
    {
        $repository  = $this->getDoctrine()->getManager()->getRepository("MembersBundle:Member");
        $queryBuilder = $repository->getQuery();
        $user = $this->get("security.context")->getToken()->getUser();

        $data = $repository->getMembersForUser($queryBuilder, $user)->getQuery()->execute();

        $view = $this->view($data, 200);

        return $this->handleView($view);
    }

    public function getMemberAction(Member $member)
    {
        $view = $this->view($member, 200);

        return $this->handleView($view);
    }
}
