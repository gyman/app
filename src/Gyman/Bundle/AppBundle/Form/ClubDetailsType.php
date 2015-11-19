<?php
namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Bundle\ClubBundle\Entity\Details;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
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
            ->add('upload_logo', 'file', ["mapped" => false, 'required' => false])
            ->add('about', 'textarea')
            ->add('account_number', 'text')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => Details::class,
            'csrf_protection' => true,
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
