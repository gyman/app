<?php
namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Gyman\Bundle\FiltersBundle\Filters\Belt;
use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BeltType extends AbstractSubfilterType
{
    private $choices = [
        parent::TYPE_EQ  => parent::LABEL_EQ,
        parent::TYPE_LT  => parent::LABEL_LT,
        parent::TYPE_GT  => parent::LABEL_GT,
        parent::TYPE_NOT => parent::LABEL_NOT,
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
            ->add('belt', 'choice', [
                'property_path' => '[belt]',
                'choices'       => [
                    'white'  => 'biały',
                    'blue'   => 'niebieski',
                    'purple' => 'purpurowy',
                    'brown'  => 'brązowy',
                    'black'  => 'czarny',
                ],
        ]);
    }

    public function getName()
    {
        return 'belt';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\Belt",
        ]);
    }
}
