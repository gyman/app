<?php

namespace Gyman\Bundle\SettingsBundle\Controller;

use Gyman\Application\Command\UpdateSectionCommand;
use Gyman\Application\Command\UpdateSectionsCommand;
use Gyman\Bundle\SettingsBundle\Form\SectionType;
use Gyman\Domain\Section;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/sections")
 */
class SectionsController extends Controller
{
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
    public function editAction(Section $section)
    {
        $command = new UpdateSectionCommand(
            $section->id(),
            $section->instructor() === null ? null : $section->instructor()->id(),
            $section->title()
        );

        $options = [
            "instructors" => $this->get("gyman.user.repository")->getInstructorsChoiceArray()
        ];

        $form = $this->createForm(SectionType::class, $command, $options);

        return $this->render("@GymanSettings/Sections/edit.html.twig", [
            "form" => $form->createView()
        ]);
    }
}
