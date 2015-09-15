<?php
namespace Gyman\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Gyman\Bundle\BaseBundle\Controller\BaseApiController;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ApiController
 * @package Gyman\Bundle\MembersBundle\Controller
 * @Rest\NamePrefix("gyman_api_")
 */
class MemberController extends BaseApiController
{
    /**
     * @Rest\View()
     */
    public function getMembersAction()
    {
        return $this->createView(
            $this->getDoctrine()->getRepository('MembersBundle:Member', 'club')->findAll(),
            200
        );
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
     * @Route("/get_vouchers", name="gyman_api_get_member_get_vouchers")
     */
    public function getVouchersAction(Member $member)
    {
        return $this->createView(['vouchers' => $member->getVouchers()], 200);
    }

    /**
     * @Rest\View()
     */
    public function putMemberAction(Request $request, Member $member)
    {
        $form = $this->createForm(
            'gyman.members.member_form_type',
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
        $manager = $this->get('gyman.members.members_manager');

        $member = $manager->create();

        $form = $this->createForm(
            'gyman.members.member_form_type',
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
