<?php

namespace Dende\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SubfilterType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        throw new \Exception("Implement this!");
    }

    /**
     * @return string
     */
    public function getName() {
        return 'filter_subfilters_FILTERNAME';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Dende\FiltersBundle\Filters\Subfilter',
        ));
    }

}
