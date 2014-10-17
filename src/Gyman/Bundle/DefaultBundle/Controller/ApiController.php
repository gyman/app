<?php

namespace Gyman\Bundle\DefaultBundle\Controller;

use Gyman\Bundle\BaseBundle\Controller\BaseApiController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\Annotations as Rest;

class ApiController extends BaseApiController
{
    /**
     * @Rest\View()
     * @Method({"GET"})
     */
    public function indexAction()
    {
        $view = $this->createView(array(
            "_links" => array(
                "self" => array(
                    "href" => $this->generateAbsoluteUrl("gyman_api")
                ),
                "members" => array(
                    "href" => $this->generateAbsoluteUrl("gyman_api_get_members")
                ),
                "vouchers" => array(
                    "href" => $this->generateAbsoluteUrl("gyman_api_get_vouchers")
                ),
            )
        ), 200);

        return $view;
    }
}

