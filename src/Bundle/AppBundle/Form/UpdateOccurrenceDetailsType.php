<?php
namespace Gyman\Bundle\AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Gyman\Application\Command\UpdateOccurrenceDetailsCommand;
use Gyman\Bundle\AppBundle\Form\Occurrence\NoteType;
use Gyman\Bundle\AppBundle\Form\Occurrence\SubjectType;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class UpdateOccurrenceDetailsType extends AbstractType implements DataMapperInterface
{
    /** @var UuidInterface */
    private $occurrenceId;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->occurrenceId = $options["occurrenceId"];

        $builder
            ->add('instructorId', ChoiceType::class, [
                'placeholder' => 'form.choose_instructor',
                'required' => false,
                'expanded' => false,
                "multiple" => false,
                'label' => 'occurrence.form.instructor.label',
                'choices' => $options["instructors"],
            ])
            ->add('subject', SubjectType::class, ["label" => false])
            ->add('note', NoteType::class, ["label" => false])
            ->add('callback', HiddenType::class, ["data" => $options["callback"]])
        ;

        $builder->setDataMapper($this);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UpdateOccurrenceDetailsCommand::class,
            'instructors' => [],
            'empty_data' => null,
            'occurrenceId' => null,
            'callback' => null
        ]);

        $resolver->setAllowedTypes('occurrenceId', [UuidInterface::class]);
        $resolver->setAllowedTypes('callback', ['string']);
    }

    public function getName() : string
    {
        return 'gyman_occurrence_form';
    }

    /**
     * @param UpdateOccurrenceDetailsCommand $data
     * @param \Symfony\Component\Form\FormInterface[]|\Traversable $forms
     */
    public function mapDataToForms($data, $forms)
    {
        $forms = iterator_to_array($forms);
        $forms['subject']->setData($data->subject());
        $forms['note']->setData($data->note());
        $forms['instructorId']->setData($data->instructorId() ? $data->instructorId()->toString() : null);
    }

    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);
        $data = new UpdateOccurrenceDetailsCommand(
            $this->occurrenceId,
            Uuid::fromString($forms["instructorId"]->getData()),
            $forms['subject']->getData(),
            $forms['note']->getData()
        );
    }
}
