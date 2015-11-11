<?php
namespace Gyman\Bundle\AppBundle\Form;

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
                "read_only" => true
            ])
            ->add('name', 'text')
            ->add('address', 'text')
            ->add('zipcode', 'text')
            ->add('city', 'text')
            ->add('country', 'text')
            ->add('phone_number', 'text')
            ->add('email_address', 'text')
            ->add('opened_from', 'text')
            ->add('opened_till', 'text')
            ->add('upload_logo', 'file')
            ->add('about', 'textarea')
            ->add('administrators', 'choice', [
                'choices' => ['kowalski', 'nowak', 'dupa'],
                'expanded' => true,
                'multiple' => true
            ])
            ->add('invite_email', 'text')
            ->add('account_number', 'text')
            ->add('invite_user', 'submit')
            ->add('sections', 'entity', [
                'class' => 'Gyman\Bundle\AppBundle\Entity\Section',
                'multiple' => true,
                "expanded" => true,
                "property" => 'title',
            ])
            ->add('voucher_types', 'collection', [
                ''
            ])
        ;

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => null,
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
