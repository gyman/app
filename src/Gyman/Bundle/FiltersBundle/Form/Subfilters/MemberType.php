<?php
namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MemberType extends AbstractSubfilterType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('member', 'entity', [
                'class'         => 'MembersBundle:Member',
                'property'      => 'name',
                'multiple'      => false,
                'query_builder' => function ($repository) {
                    return $repository->createQueryBuilder('m')
                    ->orderBy('m.name', 'ASC');
                },
                'property_path' => '[member]',
        ]);
    }

    public function getName()
    {
        return 'member';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\Member",
        ]);
    }
}
