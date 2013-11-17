<?php

namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CheckedInType extends AbstractSubfilterType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("checkedIn", "choice", array(
            "choices" => [
                true  => "tak",
                false => "nie"
            ],
            "property_path" => "[checkedIn]"
        ));
    }

    public function getName()
    {
        return "checked_in";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\CheckedIn",
        ));
    }
}
