<?php
namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SearchNameType extends AbstractSubfilterType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('search', 'text', [
            'label'         => 'Szukaj',
            'property_path' => '[search]',
        ]);
    }

    public function getName()
    {
        return 'search_name';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\SearchName",
        ]);
    }
}
