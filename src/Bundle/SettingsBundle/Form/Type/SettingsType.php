<?php

declare(strict_types=1);

namespace Gyman\Bundle\SettingsBundle\Form\Type;

use Gyman\Application\Command\UpdateSettingsCommand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SettingsType.
 */
final class SettingsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('subdomain', TextType::class, [
                'disabled' => true,
            ])
            ->add('details', ClubDetailsType::class, [
                'cascade_validation' => true,
            ])
            ->add('uploadLogo', FileType::class, [
                'required' => false,
            ])
//            ->add('administrators', 'choice', [
//                'choices' => ['kowalski', 'nowak', 'dupa'],
//                'expanded' => true,
//                'multiple' => true
//            ])
//            ->add('invite_email', TextType:class)
//            ->add('account_number', TextType:class)
//            ->add('invite_user', 'submit')
//            ->add('sections', 'collection', [
//                'type' => new SectionType(),
//                'allow_add' => true,
//                'allow_delete' => true,
//                'label' => false,
//                'cascade_validation' => true,
//            ])
//            ->add('voucher_types', 'collection', [
//                ''
//            ])
//            ->add('add_section', 'button', [
//                'label' => 'add section'
//            ])
            ->add('submit', SubmitType::class, [
                'label' => 'update settings',
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => UpdateSettingsCommand::class,
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
        return 'club_settings';
    }
}
