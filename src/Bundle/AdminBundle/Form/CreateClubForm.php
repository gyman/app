<?php

namespace Gyman\Bundle\AdminBundle\Form;

use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use Gyman\Bundle\SettingsBundle\Form\Type\ClubDetailsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateClubForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('subdomain', TextType::class)
            ->add('database', DatabaseType::class, [
                "label" => false
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "validation_groups" => ["createClub", "Default"],
            "data_class" => Club::class,
            "empty_data" => new Club()
        ]);
    }

    public function getBlockPrefix()
    {
        return 'create_club';
    }
}
