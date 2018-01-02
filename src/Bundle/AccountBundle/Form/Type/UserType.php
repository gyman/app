<?php

declare(strict_types=1);

namespace Gyman\Bundle\AccountBundle\Form\Type;

use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use Gyman\Domain\User;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends BaseType
{
    public function __construct()
    {
        return parent::__construct(User::class);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('plainPassword', RepeatedType::class, [
                'type'            => PasswordType::class,
                'error_bubbling'  => true,
                'required'        => false,
                'options'         => ['translation_domain' => 'FOSUserBundle'],
                'first_options'   => ['label'              => 'form.password'],
                'second_options'  => ['label'              => 'form.password_confirmation'],
                'invalid_message' => 'fos_user.password.mismatch',
            ]);

        $builder->remove('current_password');
        $builder->get('username')->setDisabled(true);
        $builder->get('email')->setDisabled(true);
        // todo: $builder->add('invoiceData', new InvoiceDataType());
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'cascade_validation' => true,
            'data_class'         => User::class,
            'error_bubbling'     => true,
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gyman_user_profile';
    }
}
