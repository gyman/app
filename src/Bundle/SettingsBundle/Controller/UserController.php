<?php
namespace Gyman\Bundle\SettingsBundle\Controller;

use Gyman\Bundle\SettingsBundle\Form\Type\UserType;
use Gyman\Domain\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        $form = $this->createForm(new UserType(), $entity, [
            'action' => $this->generateUrl('admin_users_create'),
            'method' => 'POST',
        ]);

        $form->add('submit', 'submit', ['label' => 'Create']);

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
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager('tenant');

        $entity = $em->getRepository(User::class)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render("GymanSettingsBundle:User:edit.html.twig", [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
    * Creates a form to edit a User entity.
    */
    private function createEditForm(User $entity) : Form
    {
        $form = $this->createForm(new UserType(), $entity, [
            'action' => $this->generateUrl('admin_users_update', ['id' => $entity->getId()]),
            'method' => 'PUT',
        ]);

        $form->add('submit', 'submit', ['label' => 'Update']);

        return $form;
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

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_users_edit', ['id' => $id]));
        }

        return $this->render("GymanSettingsBundle:User:edit.html.twig", [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
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

    /**
     * Creates a form to delete a User entity by id.
     */
    private function createDeleteForm($id) : Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_users_delete', ['id' => $id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', ['label' => 'Delete'])
            ->getForm();
    }
}
