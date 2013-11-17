<?php

namespace Gyman\Bundle\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use Gyman\Bundle\AccountBundle\Form\Type\InvoiceDataType;

class UserType extends BaseType
{

    private $class = 'Gyman\Bundle\AccountBundle\Entity\User';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('firstname', null, array(
            'label' => 'form.label.firstname',
            'error_bubbling' => true
        ));
        $builder->add('lastname', null, array(
            'label' => 'form.label.lastname',
            'error_bubbling' => true
        ));
        $builder->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'error_bubbling' => true,
                'required' => false,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ));
        
        $builder->remove('current_password');
        $builder->get("username")->setDisabled(true);
        $builder->get("email")->setDisabled(true);
        
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
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'cascade_validation'=> true,
            'data_class' => $this->class,
            'error_bubbling' => true
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gyman_user_profile';
    }
}
