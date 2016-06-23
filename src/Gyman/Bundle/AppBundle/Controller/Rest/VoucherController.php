<?php
namespace Gyman\Bundle\AppBundle\Controller\Rest;

use Doctrine\ORM\EntityNotFoundException;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\FOSRestController;
use Gyman\Domain\Voucher;

/**
 * Class VoucherController
 * @package Gyman\Bundle\AppBundle\Controller\Rest
 * @RouteResource("Voucher", pluralize=false)
 */
class VoucherController extends FOSRestController
{
    /**
     * @param $id
     * @return null|Voucher
     * @throws EntityNotFoundException
     */
    public function getAction($id)
    {
        /** @var Voucher $voucher */
        $voucher = $this->get("gyman.vouchers.repository")->find($id);

        if(is_null($voucher))
        {
            throw new EntityNotFoundException(sprintf("Voucher not found."));
        }

        return $voucher;
    }
}