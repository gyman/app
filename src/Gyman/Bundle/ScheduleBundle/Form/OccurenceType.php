<?php

namespace Gyman\Bundle\ScheduleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OccurenceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('editType', "choice", array(
                    "choices"  => [
                        "single" => "tylko ten element",
                        "rest"   => "wszystkie następne",
                    ],
                    "mapped"   => false,
                    "data"     => "single",
                    "label"    => "Edytuj",
                    "expanded" => true
                ))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gyman\Bundle\ScheduleBundle\Entity\Occurence'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dende_schedulebundle_occurence';
    }
}
