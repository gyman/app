<?php
namespace Gyman\Bundle\SettingsBundle\Form;

use Gyman\Application\Command\UpdateSectionCommand;
use Gyman\Domain\Section\SectionId;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SectionType
 * @package Gyman\Bundle\AppBundle\Form\CollectionType
 */
final class SectionType extends AbstractType implements DataMapperInterface
{
    /** @var SectionId */
    private $sectionId;

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->sectionId = $options["sectionId"];

        $builder
            ->add('instructorId', ChoiceType::class, [
                'placeholder' => 'form.choose_instructor',
                'required' => false,
                'expanded' => false,
                "multiple" => false,
                'label' => 'occurrence.form.instructor.label',
                'choices' => array_merge(["form.choose_instructor" => null], $options["instructors"]),
            ])
            ->add('title', TextType::class, [
                "label" => false,
                "required" => true,
            ])
        ;

        $builder->setDataMapper($this);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => UpdateSectionCommand::class,
            'empty_data' => null,
            'csrf_protection' => true,
            'cascade_validation' => true,
            "instructors" => [],
            "sectionId" => null,
        ]);

        $resolver->setAllowedTypes("sectionId", ['null', SectionId::class, UuidInterface::class]);
    }

    public function getName() : string
    {
        return 'section_type';
    }

    /**
     * @param UpdateSectionCommand $data
     * @param FormInterface[]|\Traversable $forms
     */
    public function mapDataToForms($data, $forms)
    {
        $forms = iterator_to_array($forms);
        $forms["instructorId"]->setData($data->instructorId());
        $forms["title"]->setData($data->title());
    }

    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);
        $data = new UpdateSectionCommand(
            $this->sectionId,
            $forms["instructorId"]->getData() !== null ? Uuid::fromString($forms["instructorId"]->getData()) : null,
            $forms["title"]->getData()
        );
    }
}
