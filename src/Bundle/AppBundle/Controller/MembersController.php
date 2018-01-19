<?php
namespace Gyman\Bundle\AppBundle\Controller;

use DateTime;
use Gyman\Application\Command\CreateUserForMemberCommand;
use Gyman\Bundle\AppBundle\Form\CreateMemberType;
use Gyman\Bundle\AppBundle\Form\UpdateMemberType;
use Gyman\Bundle\AppBundle\Form\SearchType;
use Gyman\Domain\Member;
use Gyman\Application\Command\CreateMemberCommand;
use Gyman\Application\Command\SearchMemberCommand;
use Gyman\Application\Command\UpdateMemberCommand;
use Gyman\Domain\Member\EmailAddress;
use Gyman\Domain\User;
use Gyman\Domain\UserInterface;
use Ramsey\Uuid\Uuid;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\EmailValidator;

/**
 * Class MembersController
 * @package Gyman\Bundle\AppBundle\Controller
 * @Route("/members")
 */
class MembersController extends Controller
{
    /**
     * @Route("/{id}/update", name="gyman_member_edit")
     * @ParamConverter("member", class="Gyman:Member")
     */
    public function updateAction(Member $member, Request $request)
    {
        $response = new Response('Content', 200, ['content-type' => 'text/html']);
        $command = UpdateMemberCommand::createFromMember($member);

        $form = $this->createForm(UpdateMemberType::class, $command);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $this->get("tactician.commandbus")->handle($form->getData());

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
        $command->id = Uuid::uuid4();

        $response = new Response('Content', 200, ['content-type' => 'text/html']);
        $form = $this->createForm(CreateMemberType::class, $command, [
            'action' => $this->generateUrl('gyman_member_new'),
            'method' => Request::METHOD_POST
        ]);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $command = $form->getData();
                $this->get('gyman.members.create_member')->handle($command, $this->getUser());

                $this->addFlash('success', 'flash.member_added.success');

                if($form->get("submit_and_add")->isClicked()) {
                    return $this->redirectToRoute('gyman_member_new');
                } else {
                    return $this->redirectToRoute('gyman_member_edit', [
                        'id' => $this->get('gyman.members.repository')->findOneByEmailAddress(new EmailAddress($command->email))->id(),
                    ]);
                }
            } else {
                $this->addFlash('error', 'flash.member_added.errors');
                $response->setStatusCode(400);
            }
        }

        return $response->setContent($this->renderView('GymanAppBundle:Members:new.html.twig', ['form' => $form->createView()]));
    }

    /**
     * @Route("/search", name="gyman_members_search_form")
     * @Method({"GET"})
     * @Template("@GymanApp/Members/searchForm.html.twig")
     */
    public function searchFormAction(Request $request)
    {
        $form = $this->createForm(SearchType::class, new SearchMemberCommand(), [
            "action" => $this->generateUrl("gyman_members_search"),
        ]);

        return [
            "form" => $form->createView()
        ];
    }

    /**
     * @Route("/search", name="gyman_members_search")
     * @Method({"POST"})
     * @Template("@GymanApp/Members/search.html.twig")
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm(SearchType::class, new SearchMemberCommand());
        $form->handleRequest($request);

//        if ($form->isValid()) {

            /** @var Member[] $result */
            $result = $this->get('gyman.members.repository')->search($form->getData());

            if (count($result) == 1) {
                /** @var Member $result */
                $result = $result[0];
                return $this->redirectToRoute('gyman_member_edit', ['id' => $result->id()]);
            }

            return [
                'members' => $result
            ];
//        }
    }

    /**
     * @Route("/query", name="gyman_members_typeahead")
     */
    public function typeaheadAction(Request $request)
    {
        $query = $request->get('query');

        /** @var Member[] $result */
        $result = $this->get('gyman.members.repository')->search($query);

//        $result = array_map(function(Member $member) {
//            return $member->email();
//        }, $result);

        $serializer = $this->get("jms_serializer");
        $data = $serializer->serialize($result[0], "json");

        return new Response($data);
    }

    /**
     * @Route("/{id}/sendInvitation", name="gyman_member_sendInvitation")
     * @ParamConverter("member", class="Gyman:Member")
     * @param Member $member
     * @return RedirectResponse
     */
    public function sendInvitationAction(Member $member) {
        if($member->email()->email() === null) {
            $this->addFlash('error', "Użytkownik nie ma przypisanego adresu email!");
            return $this->redirectToRoute('gyman_member_edit', ["id" => $member->id()]);
        }

        $validator = new EmailValidator();
        $constraint = new Email();
        $validator->validate($member->email()->email(), $constraint);

        $currentPassword = substr(str_shuffle('abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ1234567890-_/!@#$%^&&**()'), 0, 12);
        $token = hash('sha512', $member->email()->email() . microtime());

        $this->get("tactician.commandbus")->handle(new CreateUserForMemberCommand($member, $token, $currentPassword));

        $this->addFlash('success', sprintf('Zaproszenie wysłano na adres %s', $member->email()->email()));

        return $this->redirectToRoute('gyman_member_edit', ["id" => $member->id()]);
    }

    /**
     * @param $user User
     * @Route("/register/{user}", name="gyman_member_register")
     * @ParamConverter("user", class="Gyman:User", options={"repository_method" = "findOneByInvitationToken"})
     */
    public function registerAction(UserInterface $user){
        $em = $this->getDoctrine()->getManager('tenant');
        $this->get('security.token_storage')->setToken(new UsernamePasswordToken($user, $user->getPassword(), 'fos_userbundle', $user->getRoles()));

        $user->setPasswordRequestedAt(new DateTime("now"));

        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('fos_user_change_password');
    }
}
