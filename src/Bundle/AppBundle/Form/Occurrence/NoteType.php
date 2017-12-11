<?php
namespace Gyman\Bundle\AppBundle\Form\Occurrence;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Gyman\Domain\Calendar\Event\Occurrence\Note;
use Gyman\Domain\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            'label' => 'occurrence.form.note.label',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Note::class
        ]);
    }

    public function getName() : string
    {
        return 'gyman_occurrence_note_form';
    }
}
