<?php
namespace Gyman\Bundle\AppBundle\Controller\Rest;

use Doctrine\ORM\EntityNotFoundException;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Gyman\Domain\Member\Details\Barcode;

/**
 * Class EntryController
 * @package Gyman\Bundle\AppBundle\Controller\Rest
 * @RouteResource("Entry", pluralize=false)
 */
class EntryController extends FOSRestController
{

    /**
     * @View
     * @Post
     * @return array
     */
    public function newAction($params)
    {
        die(var_dump($params));

    }
}