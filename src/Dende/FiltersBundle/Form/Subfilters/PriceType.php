<?php

namespace Dende\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Dende\FiltersBundle\Form\Subfilters\SubfilterType;

class PriceType extends SubfilterType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add("type", "choice", array(
                    "choices" => array(
                        "eq"      => "równo",
                        "lt"      => "mniej niż",
                        "gt"      => "więcej niż",
                        "between" => "pomiędzy"
                    )
                ))
                ->add("price1", "text")
                ->add("price2", "text");
    }

}
