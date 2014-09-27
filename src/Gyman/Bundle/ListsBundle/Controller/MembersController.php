<?php

namespace Gyman\Bundle\ListsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Gyman\Bundle\MembersBundle\Entity\Member;

/**
 * @Route("/members")
 */
class MembersController extends Controller implements ListControllerInterface
{

    private $listname = "members";

    /**
     * @Route("/", name="_list_members")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $filter = $this->get("filter_provider")->getListFilter($this->listname);
        $filters = $this->get("filter_repository")->getFiltersByListname($this->listname);

        return array(
            "filter"   => $filter,
            "filters"  => $filters,
            "listname" => $this->listname
        );
    }

    /**
     * @Route("/datasource.{_format}", name="_list_members_datasource", defaults={"_format" = "json"}, requirements={"_format" = "json"})
     * @Template()
     */
    public function datasourceAction(Request $request)
    {
        $membersList = $this->get("members_list");
        $data = $membersList->getResults();

        return new JsonResponse($data);
    }

    /**
     * @Route("/gallery", name="_list_members_gallery")
     * @Template("ListsBundle:Members:gallery.html.twig")
     */
    public function galleryAction(Request $request)
    {
        $memberManager = $this->get("member_manager");
        $members = $memberManager->getMembers();

        return array("members" => $members);
    }

    /**
     * @Route("/member/{id}/details", name="_list_members_details")
     * @ParamConverter("member", class="MembersBundle:Member")
     */
    public function detailsAction(Member $member)
    {
        $lastEntry = $member->getLastEntry();

        $diff = null;

        if ($lastEntry) {
            $diff = $lastEntry->getStartDate()->diff(new \DateTime());
        }

        return new JsonResponse(array(
            "data" => $this->renderView("ListsBundle:Members:_list_tr_details.html.twig", array(
                "member"     => $member,
                "minutesAgo" => $diff
            ))
        ));
    }
}