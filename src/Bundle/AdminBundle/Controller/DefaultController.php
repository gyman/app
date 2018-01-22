<?php

namespace Gyman\Bundle\AdminBundle\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Gyman\Bundle\AdminBundle\Form\CreateClubForm;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Symfony\Component\Form\FormInterface;

class DefaultController extends BaseAdminController
{
    public function createNewClubEntity() : Club
    {
        return new Club();
    }

    public function createClubEntityForm(Club $entity, array $entityProperties, $view) : FormInterface
    {
        $form = $this->createForm(CreateClubForm::class, $entity);

        return $form;
    }
}
