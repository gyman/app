<?php
namespace Gyman\Bundle\AppBundle\Form;

use Carbon\Carbon;
use DateTime;
use Dende\CalendarBundle\Repository\ORM\OccurrenceRepository;
use Dende\Calendar\Domain\Calendar\Event\Occurrence;
use Gyman\Bundle\AppBundle\Entity\Section;
use Gyman\Bundle\AppBundle\Entity\SectionRepository;
use Gyman\Domain\Command\OpenEntryCommand;
use Gyman\Domain\Model\Entry;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class EntryType
 * @package Gyman\Bundle\AppBundle\Form
 */
final class EntryType extends AbstractType
{
    /**
     * @var OccurrenceRepository
     */
    private $occurrenceRepository;

    /**
     * @var SectionRepository
     */
    private $sectionRepository;

    /**
     * EntryType constructor.
     * @param OccurrenceRepository $occurrenceRepository
     * @param SectionRepository $sectionRepository
     */
    public function __construct(OccurrenceRepository $occurrenceRepository, SectionRepository $sectionRepository)
    {
        $this->occurrenceRepository = $occurrenceRepository;
        $this->sectionRepository = $sectionRepository;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $date = $options["date"];

        /** @var Carbon $startDate */
        $startDate = Carbon::instance($date)->setTime(0, 0, 0);

        /** @var Carbon $endDate */
        $endDate = Carbon::instance($date)->setTime(0, 0, 0)->addDays(1);

        $sectionRepository = $this->sectionRepository;

        $builder
        ->add('occurrence', 'entity', [
            'mapped' => false,
            'expanded' => true,
            "multiple" => false,
            'label' => 'entries.form.occurrence.label',
            'class' => 'Calendar:Calendar\Event\Occurrence',
            'property' => function (Occurrence $occurrence) use ($sectionRepository) {
                $start = $occurrence->startDate()->format("H:i");
                $stop = $occurrence->endDate()->format("H:i");
                $activity = $occurrence->event()->title();
                $section = $sectionRepository->findOneByCalendar($occurrence->event()->calendar());
                return sprintf("%s-%s %s (%s)", $start, $stop, $activity, $section->title());
            },
            'choices' => $this->occurrenceRepository->findByPeriod($startDate, $endDate)
        ])
        ->add('startDate', 'datetime', [
            'widget' => 'single_text',
            'format' => 'dd.MM.yyyy HH:mm',
            'attr'   => [
                'readonly' => 'READONLY',
            ],
            'label' => 'entries.form.start_date.label',
        ])
        ->add('price', 'integer', [
            'label' => 'entries.form.price.label',
        ])
        ->add('submit', 'submit', [
            'label' => 'entries.form.open_entry.label',
        ]);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            /** @var OpenEntryCommand $data */
            $data = $event->getData();
            $form = $event->getForm();

            $choices = [
                Entry::TYPE_VOUCHER => 'entries.form.entry_type.voucher.label',
                Entry::TYPE_FREE    => 'entries.form.entry_type.free.label',
                Entry::TYPE_PAID    => 'entries.form.entry_type.paid.label',
            ];
            if (!$data->member->hasCurrentVoucher() || $data->member->currentVoucher()->leftEntriesAmount() === 0) {
                unset($choices[Entry::TYPE_VOUCHER]);
            }

            $form->add('entryType', 'choice', [
                'choices'  => $choices,
                'expanded' => true,
                'label'    => 'entries.form.entry_type.label',
            ]);
        });

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            /** @var OpenEntryCommand $data */
            $data = $event->getData();
            if ($data->entryType !== Entry::TYPE_PAID) {
                $data->price = null;
            }
        });
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Gyman\Domain\Command\OpenEntryCommand',
            'date' => new DateTime()
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gyman_entry_form';
    }
}
