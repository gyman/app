<?php
namespace Gyman\Bundle\MembersBundle\Form;

use Gyman\Domain\Command\UpdateMemberCommand;
use Gyman\Domain\Model\Belt;
use Gyman\Domain\Model\Details;
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
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', 'text', ['label' => 'member.form.firstname.label'])
            ->add('lastname', 'text', ['label' => 'member.form.lastname.label'])
            ->add('birthdate', 'date', [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'label'  => 'member.form.birthdate.label',
            ])
            ->add('gender', 'choice', [
                'choices' => array_combine(Details::$genders, Details::$genders),
                'label'   => 'member.form.gender.label',
            ])
            ->add('belt', 'choice', [
                'choices'     => array_combine(Belt::$colors, Belt::$colors),
                'placeholder' => 'choose',
                'label'       => 'member.form.belt.label',
            ])
            ->add('phone', 'text', [
                'label' => 'member.form.phone.label',
            ])
            ->add('email', 'text', [
                'label' => 'member.form.email.label',
            ])
            ->add('notes', 'textarea', [
                'label' => 'member.form.notes.label',
            ])
            ->add('zipcode', 'text', [
                'label' => 'member.form.zipcode.label',
            ])
            ->add('barcode', 'text', [
                'label' => 'member.form.barcode.label',
            ])
            ->add('foto', 'file', [
                'required' => false,
                'label'    => 'member.form.foto.label',
            ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
//            'data_class'      => 'Gyman\Bundle\MembersBundle\DTO\MemberDTO',
            'data_class'      => UpdateMemberCommand::class,
            'csrf_protection' => true,
//            'error_mapping'   => [
//                'details.firstname'       => 'firstname',
//                'details.lastname'        => 'lastname',
//                'details.foto.foto'       => 'foto',
//                'details.birthdate'       => 'birthdate',
//                'email.email'             => 'email',
//                'details.zipcode'         => 'zipcode',
//                'details.barcode.barcode' => 'barcode',
//            ],
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
