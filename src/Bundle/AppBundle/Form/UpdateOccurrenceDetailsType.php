<?php
namespace Gyman\Bundle\AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Gyman\Application\Command\UpdateOccurrenceDetailsCommand;
use Gyman\Bundle\AppBundle\Form\Occurrence\NoteType;
use Gyman\Bundle\AppBundle\Form\Occurrence\SubjectType;
use Gyman\Bundle\AppBundle\Repository\UserRepository;
use Gyman\Domain\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            "multiple" => false,
            'label' => 'occurrence.form.instructor.label',
            'choices' => $options["instructors"]
        ])
        ->add('subject', SubjectType::class, ["label" => false])
        ->add('note', NoteType::class, ["label" => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UpdateOccurrenceDetailsCommand::class,
            'instructors' => []
        ]);
    }

    public function getName() : string
    {
        return 'gyman_occurrence_form';
    }
}
