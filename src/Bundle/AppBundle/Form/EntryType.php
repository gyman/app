<?php
namespace Gyman\Bundle\AppBundle\Form;

use Carbon\Carbon;
use DateTime;
use Dende\Calendar\Domain\Calendar;
use Dende\CalendarBundle\Repository\ORM\OccurrenceRepository;
use Gyman\Domain\Calendar\Event\Occurrence;
use Gyman\Domain\Section;
use Gyman\Bundle\AppBundle\Repository\SectionRepository;
use Gyman\Application\Command\OpenEntryCommand;
use Gyman\Domain\Entry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
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

        $todayOccurrences = $this->occurrenceRepository->findByPeriod($startDate, $endDate);

        $defaultOccurrences = array_filter($todayOccurrences, function(Occurrence $occurrence) {
            return $occurrence->isOngoing();
        });

        $defaultOccurrence = count($defaultOccurrences) > 0 ? array_pop($defaultOccurrences) : null;

        $builder
        ->add('occurrence', EntityType::class, [
            'required' => false,
            'expanded' => true,
            "multiple" => false,
            'label' => 'entries.form.occurrence.label',
            'class' => 'Gyman\Domain\Calendar\Event\Occurrence',
            'choice_label' => function (Occurrence $occurrence) use ($sectionRepository) {
                $start = $occurrence->startDate()->format("H:i");
                $stop = $occurrence->endDate()->format("H:i");
                $activity = $occurrence->event()->title();

                /** @var Calendar $calendar */
                $calendar = $occurrence->event()->calendar();

                return sprintf("%s-%s %s (%s)", $start, $stop, $activity, $calendar->title());
            },
            'choices' => $todayOccurrences,
            'data' => $defaultOccurrence
        ])
//        ->add('startDate', 'datetime', [
//            'widget' => 'single_text',
//            'format' => 'dd.MM.yyyy HH:mm',
//            'attr'   => [
//                'readonly' => 'READONLY',
//            ],
//            'label' => 'entries.form.start_date.label',
//        ])
        ->add('price', IntegerType::class, [
            'label' => 'entries.form.price.label',
            "attr" => [
                "min" => 0,
                "step" => 5,
            ]
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'entries.form.open_entry.label',
        ]);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            /** @var OpenEntryCommand $data */
            $data = $event->getData();
            $form = $event->getForm();

            $choices = [
                Entry::TYPE_CREDIT  => 'entries.form.entry_type.credit.label',
                Entry::TYPE_VOUCHER => 'entries.form.entry_type.voucher.label',
                Entry::TYPE_FREE    => 'entries.form.entry_type.free.label',
                Entry::TYPE_PAID    => 'entries.form.entry_type.paid.label',
            ];

            if (!$data->member->hasCurrentVoucher() || !$data->member->currentVoucher()->isCurrent()) {
                unset($choices[Entry::TYPE_VOUCHER]);
                $defaultChoice = Entry::TYPE_CREDIT;
            } else {
                unset($choices[Entry::TYPE_CREDIT]);
                $defaultChoice = Entry::TYPE_VOUCHER;
            }

            $form->add('entryType', ChoiceType::class, [
                'choices'  => array_flip($choices),
                'data'     => $defaultChoice,
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
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OpenEntryCommand::class,
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
