<?php

namespace Gyman\Bundle\AccountBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\BaseType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InvoiceDataType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('companyName', 'text', array(
                'label' => 'user.form.invoice.companyName',
                'error_bubbling' => true
            ))
            ->add('nip', 'text', array(
                'label' => 'user.form.invoice.nip',
                'error_bubbling' => true
            ))
            ->add('street', 'text', array(
                'label' => 'user.form.invoice.street',
                'error_bubbling' => true
            ))
            ->add('zipcode', 'text', array(
                'label' => 'user.form.invoice.zipcode',
                'error_bubbling' => true,
            ))
            ->add('city', 'text', array(
                'label' => 'user.form.invoice.city',
                'error_bubbling' => true
            ))
            ->add('country', 'choice', array(
                'label' => 'user.form.invoice.country',
                'error_bubbling' => true,
                'choices' => array(
                    "poland" => "countries.label.poland"
                )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        
        $resolver->setDefaults(array(
            'error_bubbling' => true,
            'data_class' => 'Gyman\Bundle\AccountBundle\Model\InvoiceData',
        ));
    }
    
    public function getName()
    {
        return 'dende_user_invoicedata';
    }
}
