<?php
namespace Gyman\Bundle\MembersBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\MembersBundle\Factory\MemberFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package Gyman\Bundle\MembersBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/{id}/edit", name="_member_edit")
     * @ParamConverter("member", class="MembersBundle:Member")
     * @Template()
     */
    public function editAction(Member $member, Request $request)
    {
        $response = new Response('Content', 200, ['content-type' => 'text/html']);

        $memberManager = $this->get('gyman.members.members_manager');
        $form = $this->createForm('gyman_member_form', $member);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                /** @var Member $member */
                $member = $form->getData();
                $memberManager->save($member);

                return $this->redirectToRoute('_member_edit', ['id' => $member->id()]);
            } else {
                $response->setStatusCode(400);
            }
        }

        return $response->setContent(
            $this->renderView('MembersBundle:Default:edit.html.twig', [
                    'form'     => $form->createView(),
                    'member'   => $member,
                    'uploader' => $this->get('oneup_uploader.templating.uploader_helper'),
            ])
        );
    }

    /**
     * @Route("/new", name="_member_new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $response = new Response('Content', 200, ['content-type' => 'text/html']);

        $memberManager = $this->get('gyman.members.members_manager');
        $member = MemberFactory::createFromArray([]);
        $form = $this->createForm('gyman_member_form', $member);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                /** @var Member $member */
                $member = $form->getData();
                $memberManager->save($member);

                return $this->redirectToRoute('_member_edit', ['id' => $member->id()]);
            } else {
                $response->setStatusCode(400);
            }
        }

        return $response->setContent(
            $this->renderView('MembersBundle:Default:new.html.twig', [
                    'form'     => $form->createView(),
                    'member'   => $member,
                    'isNew'    => true,
                    'uploader' => $this->get('oneup_uploader.templating.uploader_helper'),
            ])
        );
    }

    /**
     * @Route("/{id}/delete", name="_member_delete")
     * @ParamConverter("member", class="MembersBundle:Member")
     * @Template()
     */
    public function deleteAction(Member $member)
    {
        /**
         * @var EntityManager $entityManager
         */
        $entityManager = $this->getDoctrine()->getEntityManager();
        $entityManager->remove($member);
        $entityManager->flush();

        return [];
    }

    /**
     * @Route("/{id}/starred", name="_member_starred")
     * @ParamConverter("member", class="MembersBundle:Member")
     * @Template()
     */
    public function starredAction(Member $member)
    {
        if ($member->getStarred()) {
            $member->setStarred(false);
        } else {
            $member->setStarred(true);
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($member);
        $manager->flush();

        return new JsonResponse(['status' => 'ok', 'starred' => $member->getStarred()]);
    }

    /**
     * @Route("/search/{members}", name="_members_dashboard_search")
     * @ParamConverter("members",
     *     class="Doctrine\Common\Collections\ArrayCollection", options={
     *         "finder"    = "getDashboardSearchQueryBuilder",
     *         "entity"    = "Gyman\Bundle\MembersBundle\Entity\Member",
     *         "field"     = {"name", "barcode"},
     *         "limit"     = 10,
     *         "delimiter" = ",",
     *     }
     * )
     * @Template()
     */
    public function searchForDashboardAction(ArrayCollection $members = null)
    {
        $serializer = $this->get('jms_serializer');
        $data = $serializer->serialize(count($members) > 0 ? $members : [], 'json');

        return new Response($data, 200, ['content-type' => 'application/json']);
    }
}
