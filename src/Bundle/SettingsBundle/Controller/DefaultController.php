<?php
namespace Gyman\Bundle\SettingsBundle\Controller;

use Exception;
use Gyman\Application\Command\UpdateSectionsCommand;
use Gyman\Application\Command\UpdateSettingsCommand;
use Gyman\Bundle\SettingsBundle\Form\Type\SectionsType;
use Gyman\Bundle\SettingsBundle\Form\Type\SettingsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SettingsController
 * @package Gyman\Bundle\AppBundle\Controller
 * @Route("/settings")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="gyman_settings")
     * @Template("GymanSettingsBundle:Default:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        return $this->redirectToRoute("gyman_settings_details");

//        $club = $this->get("gyman.club.provider")->club();
//
//        if (is_null($club)) {
//            throw new Exception('No club found in database!');
//        }
//
//        $command = new UpdateSettingsCommand();
//        $command->sections = $this->get('gyman.repository.section')->findAll();
//        $command->subdomain = sprintf(
//            '%s.%s',
//            $club->getSubdomain()->getName(),
//            $this->getParameter('base_url')
//        );
//
//        $command->details = $club->details();
//        $command->name = $club->getName();
//
//        $form = $this->createForm('club_settings', $command);
//
//        if ($request->isMethod("POST")) {
//            $form->handleRequest($request);
//
//            if ($form->isValid()) {
//                $command = $form->getData();
//                $this->get('gyman.app.handler.settings_update')->handle($command);
//                $this->addFlash('success', 'flash.settings_updated.success');
//
//                return $this->redirectToRoute('gyman_settings');
//            } else {
//                $this->addFlash('error', 'flash.settings_updated.error');
//            }
//        }
//
//        return [
//            "form" => $form->createView()
//        ];
    }

    /**
     * @Route("/sections", name="gyman_settings_sections")
     * @Template("GymanSettingsBundle:Default:sections.html.twig")
     */
//    public function sectionsAction(Request $request)
//    {
//        $command = new UpdateSectionsCommand();
//        $command->sections = $this->get('gyman.repository.section')->findAll();
//
//        $form = $this->createForm(SectionsType::class, $command);
//
//        if ($request->isMethod("POST")) {
//            $form->handleRequest($request);
//
//            if ($form->isValid()) {
//                $command = $form->getData();
//                $this->get('tactician.commandbus.default')->handle($command);
//                $this->addFlash('success', 'flash.sections_updated.success');
//
//                return $this->redirectToRoute('gyman_settings_sections');
//            } else {
//                $this->addFlash('error', 'flash.sections_updated.error');
//            }
//        }
//
//        return [
//            "form" => $form->createView()
//        ];
//    }

    /**
     * @Route("/details", name="gyman_settings_details")
     * @Template("GymanSettingsBundle:Default:details.html.twig")
     */
    public function detailsAction(Request $request)
    {
        $club = $this->get("gyman.club.provider")->club();

        if (is_null($club)) {
            throw new Exception('No club found in database!');
        }

        $command = new UpdateSettingsCommand();
        $command->sections = $this->get('gyman.repository.section')->findAll();
        $command->subdomain = sprintf(
            '%s.%s',
            $club->subdomain()->name(),
            $this->getParameter('base_url')
        );

        $command->details = $club->details();
        $command->name = $club->getName();

        $form = $this->createForm(SettingsType::class, $command);

        if ($request->isMethod("POST")) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $command = $form->getData();
                $this->get('gyman.app.handler.settings_update')->handle($command);
                $this->addFlash('success', 'flash.settings_updated.success');

                return $this->redirectToRoute('gyman_settings');
            } else {
                $this->addFlash('error', 'flash.settings_updated.error');
            }
        }

        return [
            "form" => $form->createView()
        ];
    }
}
