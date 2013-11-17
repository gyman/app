<?php

namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;

class PriceType extends AbstractSubfilterType
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
                    "eq"      => "równo",
                    "lt"      => "mniej niż",
                    "gt"      => "więcej niż",
                    "between" => "pomiędzy"
                ),
                "property_path" => "[type]"
            ))
            ->add("price1", "text", ["property_path" => "[price1]"])
            ->add("price2", "text", ["property_path" => "[price2]"]);
    }

    public function getName()
    {
        return "price";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\Price",
        ));
    }
}
