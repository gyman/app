<?php
namespace Gyman\Bundle\AppBundle\Controller\Rest;

use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\FOSRestController;

class DefaultController extends FOSRestController
{
    /**
     * @Route("/")
     * @return array
     */
    public function linksAction()
    {
        return [
            "members" => ["href" => $this->generateUrl("cget_member", [], true)],
        ];
    }
}