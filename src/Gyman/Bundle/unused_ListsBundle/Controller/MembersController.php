<?php
namespace Gyman\Bundle\ListsBundle\Controller;

use Gyman\Bundle\AppBundle\Entity\Member;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/members")
 */
class MembersController extends Controller implements ListControllerInterface
{
    private $listname = 'members';

    /**
     * @Route("/", name="_list_members")
     * @Security("has_role('ROLE_ADMIN')")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $filter = $this->get('filter_provider')->getListFilter($this->listname);
        $filters = $this->get('filter_repository')->getFiltersByListname($this->listname);

        return [
            'filter'   => $filter,
            'filters'  => $filters,
            'listname' => $this->listname,
        ];
    }

    /**
     * @Route("/datasource.{_format}", name="_list_members_datasource", defaults={"_format" = "json"}, requirements={"_format" = "json"})
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @Template()
     */
    public function datasourceAction(Request $request)
    {
        $membersList = $this->get('members_list');
        $data = $membersList->getResults();

        return new JsonResponse($data);
    }

    /**
     * @Route("/gallery", name="_list_members_gallery")
     * @Security("has_role('ROLE_ADMIN')")
     * @Template("ListsBundle:Members:gallery.html.twig")
     */
    public function galleryAction(Request $request)
    {
        $members = $this->getDoctrine()
            ->getRepository('GymanAppBundle:Member', 'club')
            ->findAll();

        return ['members' => $members];
    }

    /**
     * @Route("/member/{id}/details", name="_list_members_details")
     * @Security("has_role('ROLE_ADMIN')")
     * @ParamConverter("member", class="GymanAppBundle:Member")
     */
    public function detailsAction(Member $member)
    {
        $lastEntry = $member->getLastEntry();

        $diff = null;

        if ($lastEntry) {
            $diff = $lastEntry->getStartDate()->diff(new \DateTime());
        }

        return new JsonResponse([
            'data'           => $this->renderView('ListsBundle:Members:_list_tr_details.html.twig', [
                'member'     => $member,
                'minutesAgo' => $diff,
            ]),
        ]);
    }
}
