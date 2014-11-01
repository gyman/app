<?php

namespace Gyman\Bundle\FiltersBundle\Controller;

use Gyman\Bundle\FiltersBundle\Entity\Filter;
use Gyman\Bundle\FiltersBundle\Form\FilterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class DefaultController extends Controller
{

    public static $filter_session_key = "members_list_filter";

    /**
     * @Route("/{id}/delete/{listname}", name="_filter_delete", requirements={"listname" = "(members|vouchers|entries)"})
     * @ParamConverter("filter", class="FiltersBundle:Filter")
     */
    public function deleteFilterAction(Filter $filter, Request $request, $listname)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($filter);
        $em->flush();

        $this->resetFilterAction($request, $listname);

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(array("status" => "ok"));
        }

        return $this->redirect($this->generateUrl("_{$listname}_list"));
    }

    /**
     * @Route("/reset/{listname}", name="_filter_reset", requirements={"listname" = "(members|vouchers|entries)"})
     */
    public function resetFilterAction(Request $request, $listname)
    {
        $this->get("filter_provider")->resetListFilter($listname);

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(array("status" => "ok"));
        }

        return $this->redirect($this->generateUrl("_{$listname}_list"));
    }

    /**
     * @Route("/{id}/{listname}/set", name="_filter_set", requirements={"listname" = "(members|vouchers|entries)"})
     * @ParamConverter("filter", class="FiltersBundle:Filter")
     */
    public function setFilterAction(Filter $filter, Request $request, $listname)
    {
        $filterProvider = $this->get("filter_provider");

        $filterProvider->setListFilter($filter, $listname);

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(array("status" => "ok"));
        }

        return $this->redirect($this->generateUrl("_list_members"));
    }

    /**
     * @Route("/{listname}/favourites", name="_filter_starred", requirements={"listname" = "(members|vouchers|entries)"})
     * @Template()
     */
    public function filterStarredAction(Request $request, $listname)
    {
        $starredSubfilter = new \Gyman\Bundle\FiltersBundle\Filters\Starred();

        $filter = new Filter();
        $filter->setFilter(json_encode(array($starredSubfilter->getName() => array("starred" => true))));

        $filterProvider = $this->get("filter_provider");
        $filterProvider->setListFilter($filter, $listname);

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(array("status" => "ok"));
        }

        return $this->redirect($this->generateUrl("_list_members"));
    }

    /**
     * @Route("/new/{listname}", name="_filter_new", requirements={"listname" = "(members|vouchers|entries)"})
     * @Template("FiltersBundle:Default:newFilter.html.twig")
     */
    public function newFilterAction(Request $request, $listname)
    {
        $statusCode = 200;

        $response = new Response(
            'Content',
            $statusCode,
            ['content-type' => 'text/html']
        );

        $filter = $this->get("filter_provider")->createFilterFromRequest($request);

        $formType = new FilterType(
            $this->get("filter_provider")->getFiltersForList($listname)
        );

        $mode = $request->get("mode", "init");

        $form = $this->createForm($formType, $filter, ["mode" => $mode]);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid() && $mode === "save") {
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($filter);
                $manager->flush();

                $data = array(
                    "name" => $filter->getName(),
                    "id"   => $filter->getId()
                );

                $this->get("filter_provider")->setListFilter($filter);

                return new JsonResponse(array(
                    "status" => "ok",
                    "data"   => $data
                ));
            } elseif ($form->isValid() && $mode == "set") {
                $this->get("filter_provider")->setListFilter($filter);
            } elseif (!$form->isValid()) {
                $statusCode = 400;
            }
        }

        return $response
                ->setStatusCode($statusCode)
                ->setContent(
                    $this->renderView("FiltersBundle:Default:newFilter.html.twig", array(
                        'form'     => $form->createView(),
                        'listname' => $listname,
                        "runSetupJavascript" => $mode == "init"
                    ))
                );
    }
}
