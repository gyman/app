<?php
namespace Gyman\Bundle\SettingsBundle\Form\Type;

use Gyman\Bundle\ClubBundle\Entity\Details;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class MemberType
 * @package Gyman\Bundle\AppBundle
 */
final class ClubDetailsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address', 'text')
            ->add('zipcode', 'text')
            ->add('city', 'text')
            ->add('country', 'text')
            ->add('phone_number', 'text')
            ->add('email_address', 'text')
            ->add('opened_from', 'text')
            ->add('opened_till', 'text')
            ->add('about', 'textarea')
            ->add('account_number', 'text')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => Details::class,
            'csrf_protection' => true,
            'cascade_validation' => true,
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'club_details';
    }
}
