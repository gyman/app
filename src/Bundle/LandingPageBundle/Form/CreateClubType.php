<?php

namespace Gyman\Bundle\LandingPageBundle\Form;


use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class CreateClubType
 * @package Gyman\Bundle\LandingPageBundle\Form
 */
class CreateClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text')
            ->add('email', 'email')
            ->add('password', 'password')
            ->add('password_repeat', 'password')
            ->add('club', 'text')
            ->add('subdomain', 'text')
            ->add('submit', 'submit')
        ;
    }

    public function getName()
    {
        return 'create_club';
    }
}