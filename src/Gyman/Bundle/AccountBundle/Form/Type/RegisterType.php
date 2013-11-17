<?php

namespace Gyman\Bundle\AccountBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegisterType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array(
                'label' => 'form.email',
                'translation_domain' => 'FOSUserBundle',
                'error_bubbling' => true
            ))
            ->add('username', null, array(
                'label' => 'form.username',
                'translation_domain' => 'FOSUserBundle',
                'error_bubbling' => true
            ))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'error_bubbling' => true,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
        ;
    }

    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        
        $resolver->setDefaults(array(
            'error_bubbling' => true
        ));
    }
    
    public function getName()
    {
        return 'dende_user_registration';
    }
}
