<?php

namespace Dende\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Dende\FiltersBundle\Form\Subfilters\SubfilterType;

class EntryTypeType extends SubfilterType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add("type", "choice", array(
                    "choices" => array(
                        "eq"  => "jest",
                        "not" => "nie jest"
                    )
                ))
                ->add('entryType', "choice", array(
                    "choices" => array(
                        "free"    => "darmowa",
                        "paid"    => "płatna",
                        "voucher" => "na karnet",
                    )
        ));
    }

}
