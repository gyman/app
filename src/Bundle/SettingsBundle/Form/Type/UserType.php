<?php
namespace Gyman\Bundle\SettingsBundle\Form\Type;

use Gyman\Bundle\AppBundle\Form\SectionsCollectionType;
use Symfony\Component\Form\AbstractType as BaseType;
use Gyman\Domain\User;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'form.firstname'
            ])
            ->add('lastname', TextType::class, [
                'label' => 'form.lastname'
            ])
            ->add('username', TextType::class, [
                'label' => 'form.username'
            ])
            ->add('email', EmailType::class, [
                'label' => 'form.email'
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type'            => PasswordType::class,
                'error_bubbling'  => true,
                'required'        => false,
                'options'         => ['translation_domain' => 'FOSUserBundle'],
                'first_options'   => ['label'              => 'form.password'],
                'second_options'  => ['label'              => 'form.password_confirmation'],
                'invalid_message' => 'fos_user.password.mismatch',
            ])
            ->add('roles', ChoiceType::class, [
                "multiple" => true,
                "expanded" => true,
                "choices" => [
                    "Uczestnik" => "ROLE_MEMBER",
                    "Recepcja" => "ROLE_MODERATOR",
                    "Instruktor" => "ROLE_INSTRUCTOR",
                    "Właściciel" => "ROLE_ADMIN",
                ]
            ])
            ->add('sections', SectionsCollectionType::class, [
                "by_reference" => false,
            ])
        ;

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
            'method' => Request::METHOD_POST
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
