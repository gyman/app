<?php

namespace Gyman\Bundle\AdminBundle\Form;

use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\SettingsBundle\Form\Type\ClubDetailsType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateClubForm extends CreateClubForm
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('details', ClubDetailsType::class, [
                "label" => false,
                "required" => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "validation_groups" => ["Default", "updateClub"],
            "data_class" => Club::class,
            "empty_data" => null
        ]);
    }

    public function getBlockPrefix()
    {
        return 'update_club';
    }
}
