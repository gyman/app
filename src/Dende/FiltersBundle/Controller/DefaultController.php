<?php

namespace Dende\FiltersBundle\Controller;

use Dende\FiltersBundle\Entity\Filter;
use Dende\FiltersBundle\Form\Subfilters as Subfilters;
use Dende\FiltersBundle\Form\FilterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class DefaultController extends Controller {

    public static $filter_session_key = "members_list_filter";

    /**
     * @Route("/{id}/delete/{listname}", name="_filter_delete", requirements={"listname" = "(members|vouchers|entries)"})
     * @ParamConverter("filter", class="FiltersBundle:Filter")
     */
    public function deleteFilterAction(Filter $filter, Request $request, $listname) {
        $em = $this->getDoctrine()->getManager();

        $em->remove($filter);
        $em->flush();

        $this->resetFilterAction($request, $listname);
        
        if ($request->isXmlHttpRequest())
        {
            return new JsonResponse(array("status" => "ok"));
        }

        return $this->redirect($this->generateUrl("_{$listname}_list"));
    }

    /**
     * @Route("/reset/{listname}", name="_filter_reset", requirements={"listname" = "(members|vouchers|entries)"})
     */
    public function resetFilterAction(Request $request, $listname) {
        $this->get("filter_provider")->resetListFilter($listname);

        if ($request->isXmlHttpRequest())
        {
            return new JsonResponse(array("status" => "ok"));
        }

        return $this->redirect($this->generateUrl("_{$listname}_list"));
    }

    /**
     * @Route("/{id}/{listname}/set", name="_filter_set", requirements={"listname" = "(members|vouchers|entries)"})
     * @ParamConverter("filter", class="FiltersBundle:Filter")
     */
    public function setFilterAction(Filter $filter, Request $request, $listname) {
        $filterProvider = $this->get("filter_provider");

        $filterProvider->setListFilter($filter, $listname);

        if ($request->isXmlHttpRequest())
        {
            return new JsonResponse(array("status" => "ok"));
        }

        return $this->redirect($this->generateUrl("_list_members"));
    }

    /**
     * @Route("/{listname}/favourites", name="_filter_starred", requirements={"listname" = "(members|vouchers|entries)"})
     * @Template()
     */
    public function filterStarredAction(Request $request, $listname) {
        $starredSubfilter = new \Dende\FiltersBundle\Filters\Starred();
        
        $filter = new Filter();
        $filter->setFilter(json_encode(array($starredSubfilter->getName() => array("starred" => true))));
        
        $filterProvider = $this->get("filter_provider");
        $filterProvider->setListFilter($filter, $listname);

        if ($request->isXmlHttpRequest())
        {
            return new JsonResponse(array("status" => "ok"));
        }

        return $this->redirect($this->generateUrl("_list_members"));
    }

    /**
     * @Route("/new/{listname}", name="_filter_new", requirements={"listname" = "(members|vouchers|entries)"})
     * @Template("FiltersBundle::filter.html.twig")
     */
    public function newFilterAction(Request $request, $listname) {
        $response = new Response(
                'Content', 200, array('content-type' => 'text/html')
        );

        $filter = new Filter();
        $filter->setListname($listname);

        $filters = $this->get("filter_provider")->getFiltersForList($listname);

        $form = $this->createForm(new FilterType($filters), $filter);

        $subformNamePattern = $form->getName() . "_subfilters";

        $filterParams = $request->get($subformNamePattern);

        if ($request->getMethod() == 'POST')
        {
            $form->handleRequest($request);
            $filter->setFilter(json_encode($filterParams));

            $data = array();

            if ($form->get("save")->getData() === true)
            {
                if ($form->isValid())
                {
                    $manager = $this->getDoctrine()->getManager();
                    $manager->persist($filter);
                    $manager->flush();
                }
                else
                {
                    $response->setStatusCode(400);
                }

                $data = array(
                    "name" => $filter->getName(),
                    "id"   => $filter->getId()
                );
            }

            $this->get("filter_provider")->setListFilter($filter,$listname);

            return new JsonResponse(array(
                "status" => "ok",
                "data"   => $data
            ));
        }

        return $response->setContent(
                        $this->renderView("FiltersBundle::filter.html.twig", array(
                            'form'     => $form->createView(),
                            'listname' => $listname
                        ))
        );
    }

    /**
     * @Route("/{name}", name="_filter_get")
     * @Template()
     */
    public function getSubfilterAction($name) {
        $type = $this->get("filter_provider")->getFilterType($name);
        $templateName = $this->get("filter_provider")->getTemplateName($name);

        $form = $this->createForm($type);

        return new Response($this->renderView($templateName, array(
                    "form"   => $form->createView(),
                    "widget" => $name
        )));
    }

}
