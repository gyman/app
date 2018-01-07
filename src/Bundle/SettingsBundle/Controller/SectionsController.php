<?php

namespace Gyman\Bundle\SettingsBundle\Controller;

use Gyman\Application\Command\CreateSectionCommand;
use Gyman\Application\Command\DeleteSectionCommand;
use Gyman\Application\Command\UpdateSectionCommand;
use Gyman\Bundle\SettingsBundle\Form\SectionType;
use Gyman\Domain\Section;
use Gyman\Domain\Section\SectionId;
use Ramsey\Uuid\Uuid;
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
     * @Route("/", name="gyman_settings_sections")
     * @Method({"GET"})
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $page = $request->query->getInt('page', 1);

        $pagination = $this->get("gyman.section.query")->getAllPaginated($page);

        return $this->render('@GymanSettings/Sections/index.html.twig', [
            'pagination' => $pagination,
            'page' => $page
        ]);
    }

    /**
     * @Route("/new", name="gyman_settings_sections_add")
     */
    public function addAction(Request $request)
    {
        $section = new Section();

        $form = $this->createForm(SectionType::class, $section, [
            'action' => $this->generateUrl('gyman_settings_sections_add'),
            'method' => Request::METHOD_POST,
            'validation_groups' => ['create_section']
        ]);

        if($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager('tenant');
                $em->persist($section);
                $em->flush();

                $this->addFlash("success", "settings.section.created");
                return $this->redirect($this->generateUrl('gyman_settings_sections_edit', ['id' => $section->id()]));
            } else {
                $this->addFlash('error', 'settings.section.errors');
            }
        }

        return $this->render("GymanSettingsBundle:Sections:new.html.twig", [
            'entity' => $section,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gyman_settings_sections_edit")
     * @ParamConverter("section", class="Gyman\Domain\Section")
     * @return Response
     */
    public function editAction(Section $section, Request $request)
    {
        $options = [
            "method" => Request::METHOD_POST,
            "action" => $this->generateUrl('gyman_settings_sections_edit', ["id" => $section->id()->toString()]),
        ];

        $form = $this->createForm(SectionType::class, $section, $options);

        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager('tenant');
                $em->flush();
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
