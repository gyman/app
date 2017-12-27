<?php
namespace Gyman\Bundle\SettingsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/profile")
 */
class ProfileController extends Controller
{
    /**
     * @Route("/", name="profile_edit")
     */
    public function indexAction() : Response
    {
        return $this->forward('FOSUserBundle:Profile:edit');
    }
}
