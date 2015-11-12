<?php
namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Bundle\AppBundle\Form\CollectionType\SectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class MemberType
 * @package Gyman\Bundle\AppBundle
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
            ->add('subdomain', 'text', [
                "read_only" => true,
            ])
            ->add('details', 'club_details')
//            ->add('administrators', 'choice', [
//                'choices' => ['kowalski', 'nowak', 'dupa'],
//                'expanded' => true,
//                'multiple' => true
//            ])
//            ->add('invite_email', 'text')
//            ->add('account_number', 'text')
//            ->add('invite_user', 'submit')
            ->add('sections', 'collection', [
                'type' => new SectionType(),
                'allow_add' => true,
                'allow_delete' => true,
                'label' => false
            ])
//            ->add('voucher_types', 'collection', [
//                ''
//            ])
            ->add('add_section', 'button', [
                'label' => 'add section'
            ])
            ->add('submit', 'submit', [
                'label' => 'update settings'
            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => 'Gyman\Domain\Command\UpdateSettingsCommand',
            'csrf_protection' => true,
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
