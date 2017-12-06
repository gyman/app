<?php
namespace Gyman\Bundle\SettingsBundle\Form\CollectionType;

use Gyman\Domain\Section;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('id', HiddenType::class)
            ->add('title', TextType::class, [
                "label" => false,
                "required" => true,
            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
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