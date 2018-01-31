<?php

namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Application\Command\CreateMemberCommand;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateMemberType extends UpdateMemberType
{
    public function buildForm(FormBuilderInterface $builder, array $options) : void
    {
        parent::buildForm($builder, $options);

        $builder->add('send_invitation', CheckboxType::class, [
            'label'    => 'member.form.send_invitation.label',
            'mapped'    => false
        ]);

        $builder->remove("belt");
        $builder->remove("notes");

        $builder
            ->add('submit', SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary"
                ]
            ])
            ->add('submit_and_add', SubmitType::class, [
                "attr" => [
                    "class" => "btn"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver) : void
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'      => CreateMemberCommand::class,
        ]);
    }

    public function getBlockPrefix() : string
    {
        return "member";
    }

    public function getName() : string
    {
        return 'create_member';
    }
}