<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Application\Command\UpdateOccurrenceDetailsCommand;
use Gyman\Bundle\AppBundle\Form\Occurrence\NoteType;
use Gyman\Bundle\AppBundle\Form\Occurrence\SubjectType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class UpdateOccurrenceDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('instructor_id', ChoiceType::class, [
            'required' => false,
            'expanded' => false,
            'multiple' => false,
            'label'    => 'occurrence.form.instructor.label',
            'choices'  => $options['instructors'],
        ])
        ->add('subject', SubjectType::class, ['label' => false])
        ->add('note', NoteType::class, ['label' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'  => UpdateOccurrenceDetailsCommand::class,
            'instructors' => [],
        ]);
    }

    public function getName(): string
    {
        return 'gyman_occurrence_form';
    }
}
