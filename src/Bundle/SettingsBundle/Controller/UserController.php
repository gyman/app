<?php
namespace Gyman\Bundle\SettingsBundle\Controller;

use Gyman\Bundle\SettingsBundle\Form\Type\UserType;
use Gyman\Domain\Section;
use Gyman\Domain\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Form;
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
    public function indexAction() : Response
    {
        $em = $this->getDoctrine()->getManager('tenant');

        $entities = $em->getRepository(User::class)->findAll();

        return $this->render("GymanSettingsBundle:User:index.html.twig", [
            'entities' => $entities,
        ]);
    }
    /**
     * Creates a new User entity.
     *
     * @Route("/", name="admin_users_create")
     * @Method("POST")
     */
    public function createAction(Request $request) : Response
    {
        $entity = new User();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager('tenant');
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_users_show', ['id' => $entity->getId()]));
        }

        return $this->render("GymanSettingsBundle:User:new.html.twig", [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    private function createCreateForm(User $entity) : Form
    {
        $form = $this->createForm(UserType::class, $entity, [
            'action' => $this->generateUrl('admin_users_create'),
            'method' => Request::METHOD_POST,
        ]);

        $form->add('submit', SubmitType::class, ['label' => 'Create']);

        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     * @Route("/new", name="admin_users_new")
     * @Method("GET")
     */
    public function newAction() : Response
    {
        $entity = new User();
        $form   = $this->createCreateForm($entity);

        return $this->render("GymanSettingsBundle:User:new.html.twig", [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/{id}", name="admin_users_show")
     * @Method("GET")
     */
    public function showAction($id) : Response
    {
        $em = $this->getDoctrine()->getManager('tenant');

        $entity = $em->getRepository(User::class)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render("GymanSettingsBundle:User:show.html.twig", [
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/{id}/edit", name="admin_users_edit")
     * @Method("GET")
     */
    public function editAction(string $id)
    {
        $em = $this->getDoctrine()->getManager('tenant');

        $entity = $em->getRepository(User::class)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createForm(UserType::class, $entity, [
            'action' => $this->generateUrl('admin_users_update', ['id' => $entity->getId()]),
            'method' => 'PUT',
        ]);

        return $this->render("GymanSettingsBundle:User:edit.html.twig", [
            'entity'      => $entity,
            'form'   => $editForm->createView(),
        ]);
    }

    /**
     * Edits an existing User entity.
     *
     * @Route("/{id}", name="admin_users_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id) : Response
    {
        $em = $this->getDoctrine()->getManager('tenant');

        $entity = $em->getRepository(User::class)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createForm(UserType::class, $entity, [
            'action' => $this->generateUrl('admin_users_update', ['id' => $entity->getId()]),
            'method' => 'PUT',
        ]);

        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_users_edit', ['id' => $id]));
        }

        return $this->render("GymanSettingsBundle:User:edit.html.twig", [
            'entity'      => $entity,
            'form'   => $editForm->createView(),
        ]);
    }
    /**
     * Deletes a User entity.
     *
     * @Route("/{id}", name="admin_users_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) : Response
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager('tenant');
            $entity = $em->getRepository(User::class)->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_users'));
    }

}
