<?php

namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;

class MemberType extends AbstractSubfilterType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('member', "entity", array(
                'class'         => 'MembersBundle:Member',
                'property'      => 'name',
                'multiple'      => false,
                'query_builder' => function ($repository) {
                    return $repository->createQueryBuilder('m')
                    ->orderBy("m.name", "ASC");
                },
                "property_path" => "[member]"
        ));
    }

    public function getName()
    {
        return "member";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\Member",
        ));
    }
}
