<?php

namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Application\Command\CreateMemberCommand;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateMemberType extends UpdateMemberType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'      => CreateMemberCommand::class,
        ]);
    }
}