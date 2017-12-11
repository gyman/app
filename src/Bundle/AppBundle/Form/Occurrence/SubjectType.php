<?php
namespace Gyman\Bundle\AppBundle\Form\Occurrence;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Gyman\Domain\Calendar\Event\Occurrence\Note;
use Gyman\Domain\Calendar\Event\Occurrence\Subject;
use Gyman\Domain\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            'label' => 'occurrence.form.subject.label',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Subject::class
        ]);
    }

    public function getName() : string
    {
        return 'gyman_occurrence_note_form';
    }
}
