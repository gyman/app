<?php

namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;
use Gyman\Bundle\DefaultBundle\Lib\Globals;

class RegistrationDateType extends AbstractSubfilterType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("type", "choice", array(
                "choices"       => Globals::getCompareChoices(),
                "property_path" => "[type]"
            ))
            ->add("date1", "text", ["property_path" => "[date1]"])
            ->add("date2", "text", ["property_path" => "[date2]"])
        ;
    }

    public function getName()
    {
        return "registrationDate";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\RegistrationDate",
        ));
    }
}
