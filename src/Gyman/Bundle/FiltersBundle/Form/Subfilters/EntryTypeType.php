<?php

namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;

class EntryTypeType extends AbstractSubfilterType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("type", "choice", array(
                "choices"       => array(
                    "eq"  => "jest",
                    "not" => "nie jest"
                ),
                "property_path" => "[type]"
            ))
            ->add('entryType', "choice", array(
                "choices"       => array(
                    "free"    => "darmowa",
                    "paid"    => "płatna",
                    "voucher" => "na karnet",
                ),
                "property_path" => "[entryType]"
        ));
    }

    public function getName()
    {
        return "entry_type";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\EntryType",
        ));
    }
}
