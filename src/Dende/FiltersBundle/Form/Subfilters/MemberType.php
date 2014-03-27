<?php

namespace Dende\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Dende\FiltersBundle\Form\Subfilters\SubfilterType;
use Doctrine\ORM\EntityManager;

class MemberType extends SubfilterType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('member', "entity", array(
                    'class'         => 'MembersBundle:Member',
                    'property'      => 'name',
                    'multiple'      => false,
                    'query_builder' => function($repository) {
                return $repository->createQueryBuilder('m')
                        ->orderBy("m.name", "ASC");
            },
        ));
    }

}
