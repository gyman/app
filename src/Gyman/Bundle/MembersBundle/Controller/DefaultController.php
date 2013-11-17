<?php

namespace Gyman\Bundle\MembersBundle\Controller;

use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\MembersBundle\Form\MemberType;
use Gyman\Bundle\MembersBundle\Services\Manager\MemberManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Common\Collections\ArrayCollection;

class DefaultController extends Controller
{
    /**
     * @Route("/{id}/edit", name="_member_edit")
     * @ParamConverter("member", class="MembersBundle:Member")
     * @Template()
     */
    public function editAction(Member $member, Request $request)
    {
        $response = new Response(
            'Content', 200, array('content-type' => 'text/html')
        );

        /** @var MemberManager Description */
        $memberManager = $this->get("member_manager");

        $uploaderHelper = $this->container->get('oneup_uploader.templating.uploader_helper');

        $form = $this->createForm(new MemberType($uploaderHelper), $member);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $memberManager->persist($member);
                $memberManager->flush();
            } else {
                $response->setStatusCode(400);
            }
        }

        $voucher = $memberManager->getCurrentVoucher($member);

        return $response->setContent(
            $this->renderView(
                "MembersBundle:Default:edit.html.twig", array(
                            'form'     => $form->createView(),
                            'member'   => $member,
                            'voucher'  => $voucher,
                            "uploader" => $uploaderHelper,
                                )
            )
        );
    }

    /**
     * @Route("/new", name="_member_new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $response = new Response(
            'Content', 200, array('content-type' => 'text/html')
        );

        $member = new Member();
        $uploaderHelper = $this->container->get('oneup_uploader.templating.uploader_helper');
        $form = $this->createForm(new MemberType($uploaderHelper), $member);
        $memberManager = $this->get("member_manager");

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $memberManager->save($member);
            } else {
                $response->setStatusCode(400);
            }
        }

        return $response->setContent(
            $this->renderView(
                "MembersBundle:Default:new.html.twig", array(
                            'form'     => $form->createView(),
                            'member'   => $member,
                            'isNew'    => true,
                            "uploader" => $uploaderHelper
                                )
            )
        );
    }

    /**
     * @Route("/{id}/delete", name="_member_delete")
     * @ParamConverter("member", class="MembersBundle:Member")
     * @Template()
     */
    public function deleteAction(Member $member)
    {
        $this->get("member_manager")->delete($member);

        return array();
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

        return new JsonResponse(array("status" => "ok", "starred" => $member->getStarred()));
    }

    /**
     * @Route("/search/{members}", name="_members_dashboard_search")
     * @ParamConverter("members",
     *     class="Doctrine\Common\Collections\ArrayCollection", options={
     *         "finder"    = "getDashboardSearchQueryBuilder",
     *         "entity"    = "Gyman\Bundle\MembersBundle\Entity\Member",
     *         "field"     = "name",
     *         "limit"     = 10,
     *         "delimiter" = ",",
     *     }
     * )
     * @Template()
     */
    public function searchForDashboardAction(ArrayCollection $members = null)
    {
        $serializer = $this->get("jms_serializer");

        return new Response(
            $serializer->serialize(count($members) > 0 ? $members : [], "json"), 200, ["content-type" => "application/json"]
        );
    }
}
