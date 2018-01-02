<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ErrorController.
 *
 * @Route("/error")
 */
class ErrorController extends Controller
{
    /**
     * @Route("/club-not-found", name="gyman_error_club_not_found")
     * @Template("GymanAppBundle:Error:clubNotFound.html.twig")
     */
    public function clubNotFoundAction()
    {
        return [];
    }
}
