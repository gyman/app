<?php

namespace Gyman\Bundle\AdminBundle\Form;

use Doctrine\ORM\QueryBuilder;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SwitchClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("club", EntityType::class, [
                'class' => Club::class,
                'required' => true,
                'multiple' => false,
                'label' => false,
                'expanded' => false,
                'choice_label' => function(Club $club) : string {
                    return sprintf("%s: %s", $club->subdomain()->name(), $club->name());
                },
                'choice_value' => 'subdomain.name',
                'query_builder' => function(ClubRepository $repository) : QueryBuilder {
                    return $repository->createQueryBuilder('c');
                },
                "em" => "default"
            ])
            ->add("redirectUrl", HiddenType::class, [
                "data" => $options["redirectUrl"]
            ])
            ->add('switch', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "empty_data" => [],
            "data_class" => null,
            "redirectUrl" => null
        ]);
    }

    public function getBlockPrefix()
    {
        return 'club';
    }
}
