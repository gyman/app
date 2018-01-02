<?php

declare(strict_types=1);

namespace Gyman\Bundle\AccountBundle\Form\Type;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\FormBuilderInterface;

class RegisterType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', [
                'label'              => 'form.email',
                'translation_domain' => 'FOSUserBundle',
                'error_bubbling'     => true,
            ])
            ->add('username', null, [
                'label'              => 'form.username',
                'translation_domain' => 'FOSUserBundle',
                'error_bubbling'     => true,
            ])
            ->add('plainPassword', 'repeated', [
                'type'            => 'password',
                'error_bubbling'  => true,
                'options'         => ['translation_domain' => 'FOSUserBundle'],
                'first_options'   => ['label'              => 'form.password'],
                'second_options'  => ['label'              => 'form.password_confirmation'],
                'invalid_message' => 'fos_user.password.mismatch',
            ]);
    }

    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults([
            'error_bubbling' => true,
        ]);
    }

    public function getName()
    {
        return 'dende_user_registration';
    }
}
