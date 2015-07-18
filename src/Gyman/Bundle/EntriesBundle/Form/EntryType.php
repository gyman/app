<?php

namespace Gyman\Bundle\EntriesBundle\Form;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Gyman\Bundle\ScheduleBundle\Entity\OccurenceRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntryType extends AbstractType
{
    /**
     *
     * @var OccurenceRepository
     */
    private $occurenceRepository;

    /**
     *
     * @var Entry
     */
    private $entry;

    /**
     *
     * @return Entry
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     *
     * @param  \Gyman\Bundle\EntriesBundle\Entity\Entry   $entry
     * @return \Gyman\Bundle\EntriesBundle\Form\EntryType
     */
    public function setEntry(Entry $entry)
    {
        $this->entry = $entry;

        return $this;
    }

    public function __construct(OccurenceRepository $occurenceRepository)
    {
        $this->occurenceRepository = $occurenceRepository;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['data'] instanceof Entry) {
            $this->setEntry($options['data']);
        }

        $builder
                ->add('startDate', 'datetime', [
                    'widget' => 'single_text',
                    'format' => 'dd.MM.yyyy HH:mm',
                    'attr'   => [
                        'readonly' => 'READONLY',
                    ],
                ])
                ->add('entryType', 'choice', [
                    'choices'  => $this->getChoices()->toArray(),
                    'data'     => $this->getDefaultChoice(),
                    'expanded' => true,
                ])
                ->add('entryPrice', 'text');

        $setupActivity = $this->getSetupActivityCallback();

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($setupActivity) {
            $data = $event->getData();
            $setupActivity($event->getForm(), $data->getStartDate());
        });

        $builder->get('startDate')->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) use ($setupActivity) {
            $startDate = $event->getForm()->getData();
            $setupActivity($event->getForm()->getParent(), $startDate);
        });
    }

    public function getSetupActivityCallback()
    {
        $callback = function (FormInterface $form, DateTime $date) {
            $startDate = clone($date);
            $startDate->modify('00:00:00');

            $endDate = clone($date);
            $endDate->modify('23:59:59');

            $occurences = $this->occurenceRepository->getOccurencesForPeriod($startDate, $endDate);

            $form->add('occurence', 'entity', [
                'class'       => 'ScheduleBundle:Occurence',
                'empty_value' => 'brak wydarzeń tego dnia',
                'empty_data'  => null,
                'multiple'    => false,
                'choices'     => $occurences,
                'property'    => 'event.activity.name',
            ]);
        };

        return $callback;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Gyman\Bundle\EntriesBundle\Entity\Entry',
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gyman_entries_entry';
    }

    protected function getChoices()
    {
        $choices = new ArrayCollection([
            'free' => 'darmowe',
            'paid' => 'płatne',
//            'multisport' => 'multisport',
        ]);

        $voucher = $this->getEntry()->getVoucher();

        if ($voucher && ($voucher->getAmountLeft() > 0 or $voucher->getAmount() == null)) {
            $choices->offsetSet('voucher', 'na karnet');
        }

        return $choices;
    }

    protected function getDefaultChoice()
    {
        if ($this->getEntry()->getVoucher()) {
            return 'voucher';
        } else {
            return 'paid';
        }
    }

    protected function getLabel($event)
    {
        $name = $event['name'];
        $start = $event['startHour'];
        $end = $event['endHour'];

        return sprintf('(%s-%s) %s', $start, $end, $name);
    }
}
