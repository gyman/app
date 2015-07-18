<?php

namespace Gyman\Bundle\DefaultBundle\Controller;

use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\DefaultBundle\Connection\ConnectionWrapper;
use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Gyman\Bundle\MultiDatabaseBundle\Services\CredentialsStorage;
use Gyman\Bundle\UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

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
