<?php

declare(strict_types=1);

namespace Gyman\Bundle\SettingsBundle\Form\Type;

use Gyman\Bundle\ClubBundle\Entity\Details;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class MemberType.
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
            ->add('address', TextType::class)
            ->add('zipcode', TextType::class)
            ->add('city', TextType::class)
            ->add('country', TextType::class)
            ->add('phone_number', TextType::class)
            ->add('email_address', TextType::class)
            ->add('opened_from', TextType::class)
            ->add('opened_till', TextType::class)
            ->add('about', TextareaType::class)
            ->add('account_number', TextType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'         => Details::class,
            'csrf_protection'    => true,
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
