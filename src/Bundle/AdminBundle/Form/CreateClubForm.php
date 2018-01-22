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

class CreateClubForm extends AbstractType implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('subdomain', TextType::class)
            ->add('details', ClubDetailsType::class, [
                "label" => false
            ])
            ->add('database', DatabaseType::class, [
                "label" => false
            ])
            ->add('submit', SubmitType::class)
        ;

        $builder->setDataMapper($this);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "validation_groups" => ["createClub", "updateClub"],
            "data_class" => Club::class,
            "empty_data" => null
        ]);
    }

    public function getBlockPrefix()
    {
        return 'admin_bundle_create_club_form';
    }

    /**
     * @param Club $data
     * @param FormInterface[]|\Traversable $forms
     */
    public function mapDataToForms($data, $forms)
    {
        if(null === $data) {
            return;
        }

        $forms = iterator_to_array($forms);
        $forms['name']->setData($data->name());
        $forms['subdomain']->setData($data->subdomain());
        $forms['details']->setData($data->details());
        $forms['database']->setData($data->database());
    }

    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);
        $data = new Club(
            $forms['name']->getData(),
            new Subdomain($forms['subdomain']->getData()),
            $forms['database']->getData(),
            $forms['details']->getData()
        );
    }
}
