<?php

namespace Dende\MembersBundle\Controller;

use Dende\MembersBundle\Entity\Member;
use Dende\MembersBundle\Form\MemberType;
use Dende\MembersBundle\Services\Manager\MemberManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Common\Collections\ArrayCollection;

class DefaultController extends Controller {

    /**
     * @Route("/{id}/edit", name="_member_edit")
     * @ParamConverter("member", class="MembersBundle:Member")
     * @Template()
     */
    public function editAction(Member $member, Request $request) {
        $response = new Response(
                'Content', 200, array('content-type' => 'text/html')
        );

        /** @var MemberManager Description */
        $memberManager = $this->get("member_manager");

        $uploaderHelper = $this->container->get('oneup_uploader.templating.uploader_helper');

        $form = $this->createForm(new MemberType($uploaderHelper), $member);

        if ($request->getMethod() == 'POST')
        {
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $memberManager->persist($member);
                $memberManager->flush();
            }
            else
            {
                $response->setStatusCode(400);
            }
        }

        $voucher = $memberManager->getCurrentVoucher($member);

        $totalMemberEntries = [];
        
        return $response->setContent(
                        $this->renderView("MembersBundle:Default:edit.html.twig", array(
                            'form'     => $form->createView(),
                            'member'   => $member,
                            'voucher'  => $voucher,
                            "uploader" => $uploaderHelper,
                            "totalMemberEntries" => $totalMemberEntries
                                )
                        )
        );
    }

    /**
     * @Route("/new", name="_member_new")
     * @Template()
     */
    public function newAction(Request $request) {
        $response = new Response(
                'Content', 200, array('content-type' => 'text/html')
        );

        $member = new Member();
        $uploaderHelper = $this->container->get('oneup_uploader.templating.uploader_helper');
        $form = $this->createForm(new MemberType($uploaderHelper), $member);
        $memberManager = $this->get("member_manager");

        if ($request->getMethod() == 'POST')
        {
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $memberManager->save($member);
            }
            else
            {
                $response->setStatusCode(400);
            }
        }

        return $response->setContent(
                        $this->renderView("MembersBundle:Default:new.html.twig", array(
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
    public function deleteAction(Member $member) {
        $this->get("member_manager")->delete($member);
        return array();
    }

    /**
     * @Route("/{id}/starred", name="_member_starred")
     * @ParamConverter("member", class="MembersBundle:Member")
     * @Template()
     */
    public function starredAction(Member $member) {
        if ($member->getStarred())
        {
            $member->setStarred(false);
        }
        else
        {
            $member->setStarred(true);
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($member);
        $manager->flush();

        return new JsonResponse(array("status" => "ok", "starred" => $member->getStarred()));
    }

}
