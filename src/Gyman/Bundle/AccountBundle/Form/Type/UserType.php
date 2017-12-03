<?php
namespace Gyman\Bundle\AccountBundle\Form\Type;

use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends BaseType
{
    private $class = 'Gyman\Bundle\AccountBundle\Entity\User';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('firstname', TextType::class, [
            'label'          => 'form.label.firstname',
            'error_bubbling' => true,
        ]);
        $builder->add('lastname', TextType::class, [
            'label'          => 'form.label.lastname',
            'error_bubbling' => true,
        ]);
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

//        $builder->add('invoiceData', new InvoiceDataType());
    }

    public function __construct($class)
    {
        $this->class = $class;

        return parent::__construct($this->class);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'cascade_validation' => true,
            'data_class'         => $this->class,
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
