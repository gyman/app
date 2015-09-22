<?php
namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StarredType extends AbstractSubfilterType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('starred', 'choice', [
            'choices' => [
                1 => 'oznaczony',
                0 => 'nie oznaczony',
            ],
            'property_path' => '[starred]',
        ]);
    }

    public function getName()
    {
        return 'starred';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\Starred",
        ]);
    }
}
