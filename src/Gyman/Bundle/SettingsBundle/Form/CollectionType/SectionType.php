<?php
namespace Gyman\Bundle\SettingsBundle\Form\CollectionType;

use Gyman\Domain\Section;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class SectionType
 * @package Gyman\Bundle\AppBundle\Form\CollectionType
 */
final class SectionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'hidden')
            ->add('title', 'text', [
                "label" => false,
                "required" => true,
            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => Section::class,
            'csrf_protection' => true,
            'cascade_validation' => true
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'section_type';
    }
}
