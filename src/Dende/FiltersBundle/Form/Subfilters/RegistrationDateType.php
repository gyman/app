<?php

namespace Dende\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Dende\FiltersBundle\Form\Subfilters\SubfilterType;
use Dende\DefaultBundle\Lib\Globals;

class RegistrationDateType extends SubfilterType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add("type", "choice", array(
                    "choices" => Globals::getCompareChoices()
                ))
                ->add("date1", "text")
                ->add("date2", "text")
        ;
    }

}
