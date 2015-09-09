<?php
namespace Gyman\Bundle\MembersBundle\Form;

use Gyman\Bundle\MembersBundle\Form\DataTransformer\MemberDataTransformer;
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
    /**
     * @var
     */
    protected $uploaderHelper;

    /**
     * @param $uploaderHelper
     */
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
                'choices' => array_combine(Details::$genders, Details::$genders),
            ])
            ->add('belt', 'choice', [
                'choices'     => array_combine(Belt::$colors, Belt::$colors),
                'placeholder' => 'choose',
            ])
            ->add('phone', 'text')
            ->add('email', 'text')
            ->add('notes', 'textarea')
            ->add('zipcode', 'text')
            ->add('barcode', 'text')
            ->add('foto', 'file');

        $builder->addViewTransformer(new MemberDataTransformer());
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => 'Gyman\Bundle\MembersBundle\DTO\MemberDTO',
            'csrf_protection' => true,
            'error_mapping'   => [
                'details.firstname'       => 'firstname',
                'details.lastname'        => 'lastname',
                'details.foto.foto'       => 'foto',
                'details.birthdate'       => 'birthdate',
                'email.email'             => 'email',
                'details.zipcode'         => 'zipcode',
                'details.barcode.barcode' => 'barcode',
            ],
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gyman_member_form';
    }
}
