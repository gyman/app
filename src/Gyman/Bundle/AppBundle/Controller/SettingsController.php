<?php
namespace Gyman\Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SettingsController
 * @package Gyman\Bundle\AppBundle\Controller
 * @Route("/settings")
 */
class SettingsController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm('club_settings');

        if($request->isMethod("POST"))
        {
            $form->handleRequest($request);

            if($form->isValid()) {

            } else {

            }
        }

        return [
            "form" => $form->createView()
        ];
    }
}
