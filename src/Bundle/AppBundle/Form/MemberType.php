<?php
namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Domain\Section;
use Gyman\Domain\SectionRepository;
use Gyman\Application\Command\UpdateMemberCommand;
use Gyman\Domain\Member\Details\Belt;
use Gyman\Domain\Member\Details;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

final class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', HiddenType::class)
            ->add('firstname', TextType::class, ['label' => 'member.form.firstname.label'])
            ->add('lastname', TextType::class, ['label' => 'member.form.lastname.label'])
            ->add('birthdate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'label'  => 'member.form.birthdate.label',
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => array_combine(Details::$genders, Details::$genders),
                'label'   => 'member.form.gender.label',
            ])
            ->add('belt', ChoiceType::class, [
                'choices'     => array_combine(Belt::$colors, Belt::$colors),
                'placeholder' => 'choose',
                'label'       => 'member.form.belt.label',
            ])
            ->add('phone', TextType::class, [
                'label' => 'member.form.phone.label',
            ])
            ->add('email', TextType::class, [
                'label' => 'member.form.email.label',
            ])
            ->add('notes', TextareaType::class, [
                'label' => 'member.form.notes.label',
            ])
            ->add('zipcode', TextType::class, [
                'label' => 'member.form.zipcode.label',
            ])
            ->add('barcode', TextType::class, [
                'label' => 'member.form.barcode.label',
            ])
            ->add('uploadFile', FileType::class, [
                'required' => false,
                'label'    => 'member.form.foto.label',
            ])
            ->add('fotoData', HiddenType::class)
            ->add('starred', CheckboxType::class, [
                'label'    => 'member.form.starred.label',
            ])
            ->add('sections', EntityType::class, [
                'class' => Section::class,
                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'title',
                'choice_value' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => UpdateMemberCommand::class,
            'csrf_protection' => true,
        ]);
    }

    public function getName() : string
    {
        return 'gyman_member_form';
    }
}