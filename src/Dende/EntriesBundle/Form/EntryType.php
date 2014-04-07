<?php

namespace Dende\EntriesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Dende\EntriesBundle\Entity\Entry;
use Doctrine\Common\Collections\ArrayCollection;
use Dende\ScheduleBundle\Entity\EventRepository;
use Dende\ScheduleBundle\Entity\ActivityRepository;
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
     * @var EntryRepository
     */
    private $eventRepository;

    /**
     *
     * @var Entry 
     */
    private $entry;

    /**
     *
     * @var ArrayCollection 
     */
    private $currentEvents;

    /**
     *
     * @var ArrayCollection 
     */
    private $voucherEvents;

    /**
     *
     * @var ArrayCollection 
     */
    private $allEvents;

    /**
     *
     * @var ArrayCollection 
     */
    private $todayEvents;

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="setters and getters">

    /**
     * 
     * @return ArrayCollection
     */
    public function getTodayEvents() {
        return $this->todayEvents;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection $todayEvents
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setTodayEvents(ArrayCollection $todayEvents) {
        $this->todayEvents = $todayEvents;
        return $this;
    }

    /**
     * 
     * @param \Dende\ScheduleBundle\Entity\ActivityRepository $eventRepository
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setActivityRepository(ActivityRepository $eventRepository) {
        $this->eventRepository = $eventRepository;
        return $this;
    }

    /**
     * 
     * @return ArrayCollection
     */
    public function getCurrentEvents() {
        return $this->currentEvents;
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

    /**
     * 
     * @return EventsRepository
     */
    public function getEventRepository() {
        return $this->eventRepository;
    }

    /**
     * 
     * @param \Dende\ScheduleBundle\Entity\EventRepository $eventRepository
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setEventRepository(EventRepository $eventRepository) {
        $this->eventRepository = $eventRepository;
        return $this;
    }

    /**
     * 
     * @return ArrayCollection
     */
    public function getVoucherEvents() {
        return $this->voucherEvents;
    }

    /**
     * 
     * @return ArrayCollection
     */
    public function getAllEvents() {
        return $this->allEvents;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection $voucherEvents
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setVoucherEvents(ArrayCollection $voucherEvents) {
        $this->voucherEvents = $voucherEvents;
        return $this;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection $restEvents
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setAllEvents(ArrayCollection $restEvents) {
        $this->allEvents = $restEvents;
        return $this;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection $currentEvents
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setCurrentEvents(ArrayCollection $currentEvents) {
        $this->currentEvents = $currentEvents;
        return $this;
    }

// </editor-fold>

    public function __construct(EventRepository $eventRepository) {
        $this->setEventRepository($eventRepository);

        $this->currentEvents = new ArrayCollection();
        $this->voucherEvents = new ArrayCollection();
        $this->allEvents = new ArrayCollection();
        $this->todayEvents = new ArrayCollection();
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $eventRepository = $this->getEventRepository();

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
                ->add('eventType', 'choice', array(
                    'choices'  => $this->getChoices()->toArray(),
                    'data'     => $this->getDefaultChoice(),
                    "expanded" => true
                ))
                ->add('entryPrice', 'text')
        ;


        $formModifier = function (FormInterface $form, \DateTime $startDate, EventRepository $eventRepository) {
            $events = $eventRepository->getEventsForDate($startDate);
            
            $form->add('event', "entity", [
                'class' => "ScheduleBundle:Event",
                'multiple' => false,
                'choices' => $events,
                'property' => 'activity.name'
                    ]);
        };


        $builder->addEventListener(
                FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($formModifier, $eventRepository) {
            $data = $event->getData();
            $formModifier($event->getForm(), $data->getStartDate(), $eventRepository);
        }
        );

        $builder->get('startDate')->addEventListener(
                FormEvents::POST_SUBMIT, function (FormEvent $event) use ($formModifier, $eventRepository) {
            $startDate = $event->getForm()->getData();
            $formModifier($event->getForm()->getParent(), $startDate, $eventRepository);
        }
        );
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

    public function getEvents() {

//        $voucher = $this->getEntry()->getVoucher();
//
//        if ($voucher && count($voucher->getEvents()) > 0)
//        {
//            $this->loadVoucherEvents();
//            return $this->getVoucherEvents()->toArray();
//        }
//        else
//        {
//        $this->loadCurrentEvents();
//        $this->loadVoucherEvents();
//        $this->loadAllEvents();
        $this->loadTodayEvents();

        return $this->getTodayEvents()->toArray();
//        return array(
//            "Trwające (±15min.)" => $this->getCurrentEvents()->toArray(),
//            "Dzisiejsze"         => $this->getTodayEvents()->toArray(),
//            "Karnet"             => $this->getVoucherEvents()->toArray(),
//            "Wszystkie" => $this->getAllEvents()->toArray()
//        );
//        }
    }

    /**
     * 
     * @return array
     */
    protected function loadCurrentEvents() {
        $currentEventsCollection = $this->getEventRepository()->getCurrentEvents(15);

        if (count($currentEventsCollection) > 0)
        {
            /** @var Event Description */
            foreach ($currentEventsCollection as $event) {
                /** @var Activity Description */
                $event = $event->getActivity();
                $this->getCurrentEvents()->offsetSet($event->getId(), $this->getLabel($event));
            }
        }
    }

    protected function loadVoucherEvents() {
        /** @var Voucher */
        $voucher = $this->getEntry()->getVoucher();

        if ($voucher && count($voucher->getEvents()) > 0)
        {
            $voucherEventsCollection = $voucher->getEvents();
            /** @var Activity Description */
            foreach ($voucherEventsCollection as $event) {
                $this->getVoucherEvents()->offsetSet($event->getId(), $event->getName());
            }
        }
    }

    protected function loadAllEvents() {
        $activitiesCollection = $this->getEventRepository()->getAllUniqueEvents();

        if (count($activitiesCollection) > 0)
        {
            foreach ($activitiesCollection as $event) {
                $this->getAllEvents()->offsetSet($event->getId(), $event->getName());
            }
        }
    }

    protected function loadTodayEvents() {
        $eventsCollection = $this->getEventRepository()->getTodayEvents();

        if (count($eventsCollection) > 0)
        {
            foreach ($eventsCollection as $event) {
                $this->getTodayEvents()->offsetSet($event["id"], $this->getLabel($event));
            }
        }
    }

// </editor-fold>

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

    protected function getLabelOld(Event $event) {
        $name = $event->getActivity()->getName();
        $start = $event->getStartHour();
        $end = $event->getEndHour();

        return sprintf("(%s-%s) %s", $start, $end, $name);
    }

    protected function getLabel($event) {
        $name = $event["name"];
        $start = $event["startHour"];
        $end = $event["endHour"];

        return sprintf("(%s-%s) %s", $start, $end, $name);
    }

}
