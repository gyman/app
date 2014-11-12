<?php

namespace Gyman\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Gyman\Bundle\MembersBundle\Entity\Member;

class MemberController extends FOSRestController
{
    public function getMembersAction()
    {
        $repository  = $this->getDoctrine()->getRepository("MembersBundle:Member", 'club');
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
