<?php
namespace Gyman\Bundle\MembersBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Domain\Command\CreateMemberCommand;
use Gyman\Domain\Command\UpdateMemberCommand;
use Gyman\Domain\Model\EmailAddress;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class MembersController
 * @package Gyman\Bundle\MembersBundle\Controller
 */
class MembersController extends Controller
{
    /**
     * @Route("/{id}/update", name="gyman_member_edit")
     * @ParamConverter("member", class="MembersBundle:Member")
     */
    public function updateAction(Member $member, Request $request)
    {
        $response = new Response('Content', 200, ['content-type' => 'text/html']);
        $command = UpdateMemberCommand::createFromMember($member);

        $form = $this->createForm('gyman_member_form', $command);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $this->get('gyman.members.update_member')->handle($form->getData(), $this->getUser());

                $this->addFlash('success', 'flash.member_editted.success');

                return $this->redirectToRoute('gyman_member_edit', ['id' => $member->id()]);
            } else {
                $this->addFlash('error', 'flash.member_editted.errors');
                $response->setStatusCode(400);
            }
        }

        return $response->setContent(
            $this->renderView('MembersBundle:Members:edit.html.twig', [
                    'form'     => $form->createView(),
                    'member'   => $member,
            ])
        );
    }

    /**
     * @Route("/create", name="gyman_member_new")
     */
    public function createAction(Request $request)
    {
        $response = new Response('Content', 200, ['content-type' => 'text/html']);
        $form = $this->createForm('gyman_member_form', new CreateMemberCommand(), [
            'data_class' => CreateMemberCommand::class,
        ]);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $command = $form->getData();
                $this->get('gyman.members.create_member')->handle($command, $this->getUser());

                $this->addFlash('success', 'flash.member_added.success');

                return $this->redirectToRoute('gyman_member_edit', [
                    'id' => $this->get('gyman.members.repository')->findOneByEmailAddress(new EmailAddress($command->email))->id(),
                ]);
            } else {
                $this->addFlash('error', 'flash.member_added.errors');
                $response->setStatusCode(400);
            }
        }

        return $response->setContent($this->renderView('MembersBundle:Members:new.html.twig', ['form'     => $form->createView()]));
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
