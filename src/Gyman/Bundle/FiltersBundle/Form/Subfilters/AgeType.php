<?php

namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AgeType extends AbstractSubfilterType
{
    private $choices = [
        parent::TYPE_LT      => parent::LABEL_LT,
        parent::TYPE_GT      => parent::LABEL_GT,
        parent::TYPE_BETWEEN => parent::LABEL_BETWEEN,
    ];

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', [
                'choices'       => $this->choices,
                'property_path' => '[type]',
            ])
            ->add('age1', 'text', ['property_path' => '[age1]'])
            ->add('age2', 'text', ['property_path' => '[age2]']);
    }

    public function getName()
    {
        return 'age';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\Age",
        ]);
    }
}
