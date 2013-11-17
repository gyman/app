<?php

namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CurrentVoucherType extends AbstractSubfilterType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("currentVoucher", "choice", array(
            "choices"       => array(
                true  => "posiada",
                false => "nie posiada"
            ),
            "property_path" => "[currentVoucher]"
        ));
    }

    public function getName()
    {
        return "current_voucher";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\CurrentVoucher",
        ));
    }
}
