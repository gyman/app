<?php

declare(strict_types=1);

namespace Gyman\Bundle\SettingsBundle\Form\Type;

use Gyman\Application\Command\UpdateSectionsCommand;
use Gyman\Bundle\SettingsBundle\Form\CollectionType\SectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class SettingsType.
 */
final class SectionsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sections', 'collection', [
                'type'               => new SectionType(),
                'allow_add'          => true,
                'allow_delete'       => true,
                'label'              => false,
                'cascade_validation' => true,
            ])
            ->add('add_section', 'button', [
                'label' => 'add section',
            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => UpdateSectionsCommand::class,
            'csrf_protection' => true,
            'attr'            => [
                'novalidate' => 'novalidate',
            ],
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'club_sections';
    }
}
