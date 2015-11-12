<?php
namespace Gyman\Bundle\AppBundle\Controller;

use Gyman\Domain\Command\UpdateSettingsCommand;
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
     * @Route("/", name="gyman_settings")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $command = new UpdateSettingsCommand();
        $command->sections = $this->get('gyman.repository.section')->findAll();

        $form = $this->createForm('club_settings', $command);

        if ($request->isMethod("POST")) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $command = $form->getData();
                $this->get('gyman.app.handler.settings_update')->handle($command);
                $this->addFlash('success', 'flash.settings_updated.success');

                return $this->redirectToRoute('gyman_settings');
            } else {
                $this->addFlash('warninig', 'flash.settings_updated.error');
            }
        }

        return [
            "form" => $form->createView()
        ];
    }
}
