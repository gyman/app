<?php

namespace Gyman\Bundle\SettingsBundle\Controller;

use Gyman\Application\Command\CreateSectionCommand;
use Gyman\Application\Command\DeleteSectionCommand;
use Gyman\Application\Command\UpdateSectionCommand;
use Gyman\Bundle\SettingsBundle\Form\SectionType;
use Gyman\Domain\Section;
use Gyman\Domain\Section\SectionId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/sections")
 */
class SectionsController extends Controller
{
    /**
     * @Route("/new", name="gyman_settings_sections_add")
     * @Method({"GET"})
     * @return Response
     */
    public function addAction(Request $request)
    {
        $this->get("tactician.commandbus")->handle(new CreateSectionCommand());
        $this->addFlash("success", "settings.section.created");
        return $this->redirectToRoute("gyman_settings_sections");
    }

    /**
     * @Route("/", name="gyman_settings_sections")
     * @Method({"GET"})
     * @return Response
     */
    public function indexAction()
    {
        $sections = $this->get('gyman.repository.section')->findAll();

        return $this->render('@GymanSettings/Sections/index.html.twig', [
            "sections" => $sections
        ]);
    }

    /**
     * @Route("/{id}", name="gyman_settings_sections_edit")
     * @Method({"GET", "POST"})
     * @ParamConverter("section", class="Gyman\Domain\Section")
     * @return Response
     */
    public function editAction(Section $section, Request $request)
    {
        $command = new UpdateSectionCommand(
            $section->id(),
            $section->instructor() === null ? null : $section->instructor()->id(),
            $section->title()
        );

        $options = [
            "instructors" => $this->get("gyman.user.repository")->getInstructorsChoiceArray(),
            "method" => Request::METHOD_POST,
            "action" => $this->generateUrl('gyman_settings_sections_edit', ["id" => $section->id()->toString()]),
            "sectionId" => $section->id()
        ];

        $form = $this->createForm(SectionType::class, $command, $options);

        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $this->get("tactician.commandbus")->handle($form->getData());
                $this->addFlash("success", "settings.section.updated");
                return $this->redirectToRoute('gyman_settings_sections');
            } else {
                $this->addFlash("error", "settings.section.update_error");
            }
        }

        return $this->render("@GymanSettings/Sections/edit.html.twig", [
            "form" => $form->createView(),
            "section" => $section
        ]);
    }

    /**
     * @Route("/{id}/delete", name="gyman_settings_sections_delete")
     * @Method({"GET"})
     * @ParamConverter("section", class="Gyman\Domain\Section")
     * @return Response
     */
    public function deleteAction(Section $section, Request $request)
    {
        $this->get("tactician.commandbus")->handle(new DeleteSectionCommand(
            SectionId::create($section->id())
        ));
        $this->addFlash("success", "settings.section.deleted");
        return $this->redirectToRoute('gyman_settings_sections');
    }
}
