<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Form\Occurrence;

use Gyman\Domain\Calendar\Event\Occurrence\Subject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class SubjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('content', TextType::class, [
            'required' => false,
            'label'    => 'occurrence.form.subject.label',
            'disabled' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Subject::class,
        ]);
    }

    public function getName(): string
    {
        return 'gyman_occurrence_note_form';
    }
}
