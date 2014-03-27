<?php

namespace Dende\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Dende\FiltersBundle\Form\Subfilters\SubfilterType;
use Doctrine\ORM\EntityManager;

class ActivitiesType extends SubfilterType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('activity', "entity", array(
                    'class'         => 'ScheduleBundle:Activity',
                    'property'      => 'name',
                    'multiple'      => true,
                    'query_builder' => function($er) {
                return $er->createQueryBuilder('a');
            },
        ));
    }

}
