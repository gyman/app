<?php

namespace Gyman\Bundle\ApiBundle\Controller;

use Gyman\Bundle\BaseBundle\Controller\BaseApiController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\Annotations as Rest;

class DefaultController extends BaseApiController
{
    /**
     * @Rest\View()
     */
    public function indexAction()
    {
        $view = $this->createView(array(
            "_links" => array(
                "self" => array(
                    "href" => $this->generateAbsoluteUrl("gyman_api")
                ),
//                "members" => array(
//                    "href" => $this->generateAbsoluteUrl("gyman_api_get_members")
//                ),
//                "vouchers" => array(
//                    "href" => $this->generateAbsoluteUrl("gyman_api_get_vouchers")
//                ),
//                "clubs" => array(
//                    "href" => $this->generateAbsoluteUrl("gyman_api_get_clubs")
//                ),
            )
        ), 200);

        return $view;
    }
}
