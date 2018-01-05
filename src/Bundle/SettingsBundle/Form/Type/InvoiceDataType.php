<?php
namespace Gyman\Bundle\SettingsBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\BaseType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InvoiceDataType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('companyName', 'text', [
                'label'          => 'user.form.invoice.companyName',
                'error_bubbling' => true,
            ])
            ->add('nip', 'text', [
                'label'          => 'user.form.invoice.nip',
                'error_bubbling' => true,
            ])
            ->add('street', 'text', [
                'label'          => 'user.form.invoice.street',
                'error_bubbling' => true,
            ])
            ->add('zipcode', 'text', [
                'label'          => 'user.form.invoice.zipcode',
                'error_bubbling' => true,
            ])
            ->add('city', 'text', [
                'label'          => 'user.form.invoice.city',
                'error_bubbling' => true,
            ])
            ->add('country', 'choice', [
                'label'          => 'user.form.invoice.country',
                'error_bubbling' => true,
                'choices'        => [
                    'poland' => 'countries.label.poland',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults([
            'error_bubbling' => true,
            'data_class'     => 'Gyman\Bundle\SettingsBundle\Model\InvoiceData',
        ]);
    }

    public function getName()
    {
        return 'dende_user_invoicedata';
    }
}
