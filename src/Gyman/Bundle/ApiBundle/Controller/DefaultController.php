<?php

namespace Gyman\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Gyman\Bundle\BaseBundle\Controller\BaseApiController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends BaseApiController
{
    /**
     * @Rest\View()
     * @Route("/", name="gyman_api")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        $view = $this->createView([
            '_links' => [
                'self' => [
                    'href' => $this->generateAbsoluteUrl('gyman_api'),
                ],
                'members' => [
                    'href' => $this->generateAbsoluteUrl('gyman_api_get_members'),
                ],
//                "vouchers" => array(
//                    "href" => $this->generateAbsoluteUrl("gyman_api_get_vouchers")
//                ),
//                "clubs" => array(
//                    "href" => $this->generateAbsoluteUrl("gyman_api_get_clubs")
//                ),
            ],
        ], 200);

        return $view;
    }
}
