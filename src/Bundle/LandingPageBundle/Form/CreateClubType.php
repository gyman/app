<?php

declare(strict_types=1);

namespace Gyman\Bundle\LandingPageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class CreateClubType.
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
