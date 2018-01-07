<?php
namespace Gyman\Bundle\SettingsBundle\Controller;

use Gyman\Bundle\SettingsBundle\Form\Type\UserType;
use Gyman\Domain\Section;
use Gyman\Domain\User;
use Ramsey\Uuid\Uuid;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/users")
 */
class UserController extends Controller
{
    /**
     * @Route("/", name="admin_users")
     * @Method("GET")
     */
    public function indexAction(Request $request) : Response
    {
        $page = $request->query->getInt('page', 1);

        $pagination = $this->get("gyman.users.query")->getAllPaginated($page);

        return $this->render("GymanSettingsBundle:User:index.html.twig", [
            'pagination' => $pagination,
            'page' => $page
        ]);
    }
    /**
     * Creates a new User entity.
     *
     * @Route("/new", name="admin_users_create")
     */
    public function createAction(Request $request) : Response
    {
        $id = Uuid::uuid4();

        $user = new User($id);

        $form = $this->createForm(UserType::class, $user, [
            'action' => $this->generateUrl('admin_users_create'),
            'method' => Request::METHOD_POST,
            'validation_groups' => ['create_user']
        ]);

        if($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager('tenant');
                $em->persist($user);
                $em->flush();

                $this->addFlash('success', 'form.create_user.success');
                return $this->redirect($this->generateUrl('admin_users_update', ['id' => $user->getId()]));
            } else {
                $this->addFlash('error', 'form.create_user.errors');
            }
        }

        return $this->render("GymanSettingsBundle:User:new.html.twig", [
            'entity' => $user,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/update", name="admin_users_update")
     */
    public function updateAction(Request $request, string $id) : Response
    {
        $em = $this->getDoctrine()->getManager('tenant');

        $entity = $em->getRepository(User::class)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createForm(UserType::class, $entity, [
            'action' => $this->generateUrl('admin_users_update', ['id' => $entity->getId()]),
            'method' => Request::METHOD_POST,
            'validation_groups' => ['update_user'],
        ]);

        if ($request->isMethod(Request::METHOD_POST)) {
            $editForm->handleRequest($request);

            if ($editForm->isValid()) {
                $em->flush();

                $this->addFlash('success', 'form.update_user.success');
                return $this->redirect($this->generateUrl('admin_users_update', ['id' => $id]));
            } else {
                $this->addFlash('error', 'form.update_user.errors');
            }
        }

        return $this->render("GymanSettingsBundle:User:edit.html.twig", [
            'entity'      => $entity,
            'form'   => $editForm->createView(),
        ]);
    }
    /**
     * @Route("/{id}/delete", name="admin_users_delete")
     */
    public function deleteAction(Request $request, string $id) : Response
    {
        $em = $this->getDoctrine()->getManager('tenant');

        /** @var User $entity */
        $entity = $em->getRepository(User::class)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $entity->delete();
        $em->flush();

        $this->addFlash('success', 'settings.user_deleted.success');
        return $this->redirect($this->generateUrl('admin_users', [
            "page" => $request->query->getInt('page', 1)
        ]));
    }
}
