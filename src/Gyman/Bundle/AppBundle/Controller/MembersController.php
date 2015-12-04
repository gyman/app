<?php
namespace Gyman\Bundle\AppBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gyman\Bundle\AppBundle\Entity\Member;
use Gyman\Domain\Command\CreateMemberCommand;
use Gyman\Domain\Command\SearchMemberCommand;
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
 * @package Gyman\Bundle\AppBundle\Controller
 * @Route("/members")
 */
class MembersController extends Controller
{
    /**
     * @Route("/{id}/update", name="gyman_member_edit")
     * @ParamConverter("member", class="GymanAppBundle:Member")
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
            $this->renderView('GymanAppBundle:Members:edit.html.twig', [
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
        $command = new CreateMemberCommand();

        $response = new Response('Content', 200, ['content-type' => 'text/html']);
        $form = $this->createForm('gyman_member_form', $command, [
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

        return $response->setContent($this->renderView('GymanAppBundle:Members:new.html.twig', ['form'     => $form->createView()]));
    }

    /**
     * @Route("/search", name="gyman_members_search")
     * @Template()
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm('gyman_member_search_form', new SearchMemberCommand());

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {

                /** @var Member[] $result */
                $result = $this->get('gyman.members.repository')->search($form->getData()->query);

                if (empty($result)) {
                    throw new EntityNotFoundException(
                        sprintf("No member was found for '%s' query", $form->getData()->query)
                    );
                }

                if (count($result) > 1) {
                    $this->addFlash('error', 'flash.member_search.more_results_than_one_please_specify_query_more');
                }

                /** @var Member $result */
                $result = $result[0];

                return $this->redirectToRoute('gyman_member_edit', ['id' => $result->id()]);
            }
        }
    }

    /**
     * @Route("/query", name="gyman_members_typeahead")
     */
    public function typeaheadAction(Request $request)
    {
        $query = $request->get('query');
        $result = $this->get('gyman.members.repository')->search($query);
        return new Response($this->get("jms_serializer")->serialize($result, "json"));
    }
}
