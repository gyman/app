<?php
namespace Gyman\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Gyman\Bundle\BaseBundle\Controller\BaseApiController;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;

/**
 * Class ApiController
 * @package Gyman\Bundle\VouchersBundle\Controller
 * @Rest\RouteResource("Voucher")
 */
class VoucherController extends BaseApiController
{
    /**
     * @Rest\View()
     */
    public function getVouchersAction()
    {
        return $this->createView($this->get('doctrine.orm.entity_manager')->getRepository('VouchersBundle:Voucher')->findAll(), 200);
    }
    /**
     * @Rest\View()
     */
    public function getVoucherAction(Voucher $voucher)
    {
        return $this->createView($voucher, 200);
    }

    /**
     * @Rest\View()
     */
    public function getActivitiesAction(Voucher $voucher)
    {
        return $this->createView(['activities' => $voucher->getActivities()], 200);
    }
}
