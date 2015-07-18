<?php

namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VoucherStartType extends AbstractSubfilterType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', [
                'choices'       => Globals::getCompareChoices(),
                'property_path' => '[type]',
            ])
            ->add('date1', 'text', ['property_path' => '[date1]'])
            ->add('date2', 'text', ['property_path' => '[date2]']);
    }

    public function getName()
    {
        return 'voucher_start';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\VoucherStart",
        ]);
    }
}
