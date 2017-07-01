<?php
namespace Gyman\Bundle\AppBundle\Controller\Rest;

use Doctrine\ORM\EntityNotFoundException;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Gyman\Domain\Member\Details\Barcode;

/**
 * Class MemberController
 * @package Gyman\Bundle\AppBundle\Controller\Rest
 * @RouteResource("Member", pluralize=false)
 */
class MemberController extends FOSRestController
{
    /**
     * @View
     * @Get
     * @return array
     */
    public function cgetAction()
    {
        return $this->get("gyman.members.repository")->findBy([], null, 3);
    }

    public function newAction()
    {}

    /**
     * @param $barcode
     * @return \Gyman\Domain\Member
     * @throws EntityNotFoundException
     */
    public function getAction($barcode)
    {
        $member = $this->get("gyman.members.repository")->findOneByBarcode(new Barcode($barcode));

        if(is_null($member))
        {
            throw new EntityNotFoundException(sprintf("Member with barcode '%s' not found.", $barcode));
        }

        return $member;
    }
}