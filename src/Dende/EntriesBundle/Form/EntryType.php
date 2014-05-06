<?php

namespace Dende\EntriesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Dende\EntriesBundle\Entity\Entry;
use Doctrine\Common\Collections\ArrayCollection;
use Dende\ScheduleBundle\Entity\EventRepository;
use Dende\ScheduleBundle\Entity\OccurenceRepository;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Dende\ScheduleBundle\Form\DataTransformer\EventTransformer;
use Dende\ScheduleBundle\Entity\Activity;
use Dende\MembersBundle\Form\DataTransformer\DateToStringTransformer;
use Dende\ScheduleBundle\Entity\Event;
use Symfony\Component\Form\FormInterface;

class EntryType extends AbstractType {
// <editor-fold defaultstate="collapsed" desc="fields">

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

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="setters and getters">

    /**
     * 
     * @param \Dende\ScheduleBundle\Entity\OccurenceRepository $eventRepository
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setOccurenceRepository(OccurenceRepository $occurenceRepository) {
        $this->occurenceRepository = $occurenceRepository;
        return $this;
    }

    /**
     * 
     * @return Entry
     */
    public function getEntry() {
        return $this->entry;
    }

    /**
     * 
     * @param \Dende\EntriesBundle\Entity\Entry $entry
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setEntry(Entry $entry) {
        $this->entry = $entry;
        return $this;
    }

// </editor-fold>

    public function __construct(OccurenceRepository $occurenceRepository) {
        $this->setOccurenceRepository($occurenceRepository);
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        if ($options["data"] instanceof Entry)
        {
            $this->setEntry($options["data"]);
        }

        $builder
            ->add('startDate', "datetime", array(
                "widget" => "single_text",
                "format" => "dd.MM.yyyy H:mm",
                "attr"   => array(
                    "readonly" => "READONLY",
                )
            ))
            ->add('entryType', 'choice', array(
                'choices'  => $this->getChoices()->toArray(),
                'data'     => $this->getDefaultChoice(),
                "expanded" => true,
            ))
            ->add('entryPrice', 'text')
        ;

        $builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, "setupActivity"));

//        $formModifier = function (FormInterface $form, \DateTime $startDate, OccurenceRepository $occurenceRepository) {
//            $startDate->modify("00:00:00");
//            $endDate = clone($startDate);
//            $endDate->modify("23:59:59");
//
//            $occurences = $occurenceRepository->getOccurencesForPeriod($startDate, $endDate);
//
//            $form->add('occurence', "entity", [
//                'class'    => "ScheduleBundle:Occurence",
//                'multiple' => false,
//                'choices'  => $occurences,
//                'property' => 'event.activity.name'
//            ]);
//        };


//        $builder->addEventListener(
//            FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($formModifier, $occurenceRepository) {
//            $data = $event->getData();
//            $formModifier($event->getForm(), $data->goetStartDate(), $occurenceRepository);
//        }
//        );
//
//        $builder->get('startDate')->addEventListener(
//            FormEvents::POST_SUBMIT, function (FormEvent $event) use ($formModifier, $occurenceRepository) {
//            $startDate = $event->getForm()->getData();
//            $formModifier($event->getForm()->getParent(), $startDate, $occurenceRepository);
//        }
//        );
    }

    public function setupActivity(FormEvent $formEvent) {
        $data = $formEvent->getData();
        $form = $formEvent->getForm();

        $startDate = clone($data->getStartDate());
        $startDate->modify("00:00:00");
        
        $endDate = clone($startDate);
        $endDate->modify("23:59:59");

        $occurences = $this->occurenceRepository->getOccurencesForPeriod($startDate, $endDate);

        $form->add('occurence', "entity", [
            'class'    => "ScheduleBundle:Occurence",
            'multiple' => false,
            'choices'  => $occurences,
            'property' => 'event.activity.name'
        ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Dende\EntriesBundle\Entity\Entry'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'dende_entriesbundle_entry';
    }

    protected function getChoices() {
        $choices = new ArrayCollection(array(
            'free' => 'darmowe',
            'paid' => "płatne",
//            'multisport' => 'multisport',
        ));

        $voucher = $this->getEntry()->getVoucher();

        if ($voucher && ($voucher->getAmountLeft() > 0 OR $voucher->getAmount() == null))
        {
            $choices->offsetSet("voucher", "na karnet");
        }

        return $choices;
    }

    protected function getDefaultChoice() {
        if ($this->getEntry()->getVoucher())
        {
            return "voucher";
        }
        else
        {
            return "paid";
        }
    }

    protected function getLabel($event) {
        $name = $event["name"];
        $start = $event["startHour"];
        $end = $event["endHour"];

        return sprintf("(%s-%s) %s", $start, $end, $name);
    }

}
