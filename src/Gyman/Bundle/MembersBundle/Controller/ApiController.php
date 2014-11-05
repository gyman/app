<?php

namespace Gyman\Bundle\MembersBundle\Controller;

use Gyman\Bundle\BaseBundle\Controller\BaseApiController;
use Gyman\Bundle\MembersBundle\Entity\Member;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ApiController
 * @package Gyman\Bundle\MembersBundle\Controller
 * @Rest\RouteResource("Member")
 */
class ApiController extends BaseApiController
{
    /**
     * @Rest\View()
     */
    public function getMembersAction()
    {
        return $this->createView($this->get('doctrine.orm.entity_manager')->getRepository("MembersBundle:Member")->findAll(), 200);
    }
    /**
     * @Rest\View()
     */
    public function getMemberAction(Member $member)
    {
        return $this->createView($member, 200);
    }

    /**
     * @Rest\View()
     */
    public function getVouchersAction(Member $member)
    {
        return $this->createView(["vouchers" => $member->getVouchers()], 200);
    }

    /**
     * @Rest\View()
     */
    public function putMemberAction(Request $request, Member $member)
    {
        $form = $this->createForm(
            'gyman_members_member_form_type',
            $member,
            ['csrf_protection' => false]
        );

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $this->get('gyman.members.members_manager')->save($member);

            $view = $this->createView($member, 200);

            $view->setHeader(
                'Content-Location',
                $this->generateUrl(
                    'gyman_api_get_member',
                    ['id' => $member->getId()],
                    true
                )
            );

            return $view;
        }

        return $this->createView($form, 422);
    }

    /**
     * Create a member
     *
     * @Rest\View()
     */
    public function postMemberAction(Request $request)
    {
        $manager = $this->get("gyman.members.members_manager");

        $member = $manager->create();

        $form = $this->createForm(
            'gyman_members_member_form_type',
            $member,
            ['csrf_protection' => false]
        );

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $manager->save($member, true);
            $view = $this->createView($member, 201);

            $view->setHeader(
                'Content-Location',
                $this->generateUrl(
                    'gyman_api_get_member',
                    ['id' => $member->getId()],
                    true
                )
            );

            return $view;
        }

        return $this->createView($form, 422);
    }
}
