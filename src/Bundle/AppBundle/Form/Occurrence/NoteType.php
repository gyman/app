<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Form\Occurrence;

use Gyman\Domain\Calendar\Event\Occurrence\Note;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('content', TextareaType::class, [
            'required' => false,
            'label'    => 'occurrence.form.note.label',
            'disabled' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
        ]);
    }

    public function getName(): string
    {
        return 'gyman_occurrence_note_form';
    }
}
