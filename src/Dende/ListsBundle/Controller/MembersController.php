<?php

namespace Dende\ListsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Dende\MembersBundle\Entity\Member;
use Dende\ListsBundle\Controller\ListControllerInterface;

/**
 * @Route("/members")
 */
class MembersController extends Controller implements ListControllerInterface {

// <editor-fold defaultstate="collapsed" desc="listname">
    private $listname = "members";

    public function getListname() {
        return $this->listname;
    }

// </editor-fold>

    /**
     * @Route("/", name="_list_members")
     * @Template()
     */
    public function indexAction(Request $request) {
        $filter = $this->get("filter_provider")->getListFilter($this->getListname());
        $filters = $this->get("filter_repository")->getFiltersByListname($this->getListname());

        return array(
            "filter"   => $filter,
            "filters"  => $filters,
            "listname" => $this->getListname()
        );
    }

    /**
     * @Route("/datasource.{_format}", name="_list_members_datasource", defaults={"_format" = "json"}, requirements={"_format" = "json"})
     * @Template()
     */
    public function datasourceAction(Request $request) {
        $membersList = $this->get("members_list");
        $data = $membersList->getResults();
        return new JsonResponse($data);
    }

    /**
     * @Route("/gallery", name="_list_members_gallery")
     * @Template("ListsBundle:Members:gallery.html.twig")
     */
    public function galleryAction(Request $request) {
        $memberManager = $this->get("member_manager");
        $members = $memberManager->getMembers();

        return array("members" => $members);
    }

    /**
     * @Route("/member/{id}/details", name="_list_members_details")
     * @ParamConverter("member", class="MembersBundle:Member")
     */
    public function detailsAction(Member $member) {
        return new JsonResponse(array(
            "data" => $this->renderView("ListsBundle:Members:_list_tr_details.html.twig", array(
                "member" => $member))
        ));
    }

}
