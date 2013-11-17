<?php

namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;

class StarredType extends AbstractSubfilterType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("starred", "choice", array(
            "choices" => array(
                1 => "oznaczony",
                0 => "nie oznaczony"
            ),
            "property_path" => "[starred]"
        ));
    }

    public function getName()
    {
        return "starred";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\Starred",
        ));
    }
}
