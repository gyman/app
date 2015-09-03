<?php

namespace Gyman\Bundle\MembersBundle\Form;

use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\MembersBundle\Form\DataTransformer\DateToStringTransformer;
use Gyman\Bundle\MembersBundle\Form\DataTransformer\NewMemberDataTransformer;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;
use Gyman\Component\Members\Model\Belt;
use Gyman\Component\Members\Model\Details;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class MemberType
 * @package Gyman\Bundle\MembersBundle
 */
class MemberType extends AbstractType
{
    protected $uploaderHelper;

    public function __construct($uploaderHelper)
    {
        $this->uploaderHelper = $uploaderHelper;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', 'text')
            ->add('lastname', 'text')
            ->add('birthdate', 'date', [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
            ])
            ->add('gender', 'choice', [
                'choices' => array_combine(Details::$genders, Details::$genders)
            ])
            ->add('belt', 'choice', [
                'choices' => array_combine(Belt::$colors, Belt::$colors)
            ])
            ->add('phone', 'text')
            ->add('email', 'text', [
                'cascade_validation' => true
            ])
            ->add('notes', 'textarea')
            ->add('zipcode', 'text')
            ->add('barcode', 'text')
            ->add('foto', 'hidden')
//                ->add('fotoUploader', 'file', [
//                    'mapped' => false,
//                    'attr'   => ['data-url' => $this->uploaderHelper->endpoint('gallery')],
//                ])
        ;

        $builder->addViewTransformer(new NewMemberDataTransformer());
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => 'Gyman\Bundle\MembersBundle\DTO\NewMember',
            'csrf_protection' => true,
            'cascade_validation' => true
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'member';
    }
}
