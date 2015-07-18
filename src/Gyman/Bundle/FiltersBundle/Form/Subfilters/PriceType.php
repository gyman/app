<?php

namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PriceType extends AbstractSubfilterType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', [
                'choices'       => [
                    'eq'      => 'równo',
                    'lt'      => 'mniej niż',
                    'gt'      => 'więcej niż',
                    'between' => 'pomiędzy',
                ],
                'property_path' => '[type]',
            ])
            ->add('price1', 'text', ['property_path' => '[price1]'])
            ->add('price2', 'text', ['property_path' => '[price2]']);
    }

    public function getName()
    {
        return 'price';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\Price",
        ]);
    }
}
