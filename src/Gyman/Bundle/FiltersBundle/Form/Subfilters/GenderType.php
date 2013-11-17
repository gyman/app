<?php

namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;

class GenderType extends AbstractSubfilterType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("gender", "choice", array(
            "choices"       => array(
                "male"   => "Mężczyzna",
                "female" => "Kobieta"
            ),
            "property_path" => "[gender]"
        ));
    }

    public function getName()
    {
        return "gender";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\Gender",
        ));
    }
}
