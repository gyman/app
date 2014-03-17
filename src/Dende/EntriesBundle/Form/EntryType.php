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
use Dende\ScheduleBundle\Form\DataTransformer\ActivityTransformer;
use Dende\ScheduleBundle\Entity\Activity;

class EntryType extends AbstractType {
// <editor-fold defaultstate="collapsed" desc="fields">

    /**
     *
     * @var EntryRepository
     */
    private $eventRepository;

    /**
     *
     * @var ActivityRepository
     */
    private $activityRepository;

    /**
     *
     * @var Entry 
     */
    private $entry;

    /**
     *
     * @var ArrayCollection 
     */
    private $currentActivities;

    /**
     *
     * @var ArrayCollection 
     */
    private $voucherActivities;

    /**
     *
     * @var ArrayCollection 
     */
    private $allActivities;

    /**
     *
     * @var ArrayCollection 
     */
    private $todayActivities;

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="setters and getters">

    /**
     * 
     * @return ArrayCollection
     */
    public function getTodayActivities() {
        return $this->todayActivities;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection $todayActivities
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setTodayActivities(ArrayCollection $todayActivities) {
        $this->todayActivities = $todayActivities;
        return $this;
    }

    /**
     * 
     * @return ActivityRepository
     */
    public function getActivityRepository() {
        return $this->activityRepository;
    }

    /**
     * 
     * @param \Dende\ScheduleBundle\Entity\ActivityRepository $activityRepository
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setActivityRepository(ActivityRepository $activityRepository) {
        $this->activityRepository = $activityRepository;
        return $this;
    }

    /**
     * 
     * @return ArrayCollection
     */
    public function getCurrentActivities() {
        return $this->currentActivities;
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
    public function getVoucherActivities() {
        return $this->voucherActivities;
    }

    /**
     * 
     * @return ArrayCollection
     */
    public function getAllActivities() {
        return $this->allActivities;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection $voucherActivities
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setVoucherActivities(ArrayCollection $voucherActivities) {
        $this->voucherActivities = $voucherActivities;
        return $this;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection $restActivities
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setAllActivities(ArrayCollection $restActivities) {
        $this->allActivities = $restActivities;
        return $this;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection $currentActivities
     * @return \Dende\EntriesBundle\Form\EntryType
     */
    public function setCurrentActivities(ArrayCollection $currentActivities) {
        $this->currentActivities = $currentActivities;
        return $this;
    }

// </editor-fold>

    public function __construct(EventRepository $eventRepository, ActivityRepository $activityRepository) {
        $this->setEventRepository($eventRepository);
        $this->setActivityRepository($activityRepository);

        $this->currentActivities = new ArrayCollection();
        $this->voucherActivities = new ArrayCollection();
        $this->allActivities = new ArrayCollection();
        $this->todayActivities = new ArrayCollection();
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
                ->add($builder->create('activity', "choice", array(
                            'multiple' => false,
                            'choices'  => $this->getActivities(),
                        ))
                        ->addModelTransformer(new ActivityTransformer($this->getActivityRepository()))
                )
                ->add('entryType', 'choice', array(
                    'choices'  => $this->getChoices()->toArray(),
                    'data'     => $this->getDefaultChoice(),
                    "expanded" => true
                ))
                ->add('entryPrice', 'text')
        ;
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

    public function getActivities() {

//        $voucher = $this->getEntry()->getVoucher();
//
//        if ($voucher && count($voucher->getActivities()) > 0)
//        {
//            $this->loadVoucherActivities();
//            return $this->getVoucherActivities()->toArray();
//        }
//        else
//        {
        $this->loadCurrentActivities();
        $this->loadVoucherActivities();
        $this->loadAllActivities();
        $this->loadTodayActivities();

        return array(
            "Trwające (±15min.)"   => $this->getCurrentActivities()->toArray(),
            "Dzisiejsze" => $this->getTodayActivities()->toArray(),
            "Karnet"     => $this->getVoucherActivities()->toArray(),
            "Wszystkie"  => $this->getAllActivities()->toArray()
        );
//        }
    }

    /**
     * 
     * @return array
     */
    protected function loadCurrentActivities() {
        $currentEventsCollection = $this->getEventRepository()->getCurrentEvents(15);

        if (count($currentEventsCollection) > 0)
        {
            /** @var Event Description */
            foreach ($currentEventsCollection as $event) {
                /** @var Activity Description */
                $activity = $event->getActivity();
                $this->getCurrentActivities()->offsetSet($activity->getId(), $this->getLabel($activity));
            }
        }
    }

    protected function loadVoucherActivities() {
        /** @var Voucher */
        $voucher = $this->getEntry()->getVoucher();

        if ($voucher && count($voucher->getActivities()) > 0)
        {
            $voucherActivitiesCollection = $voucher->getActivities();
            /** @var Activity Description */
            foreach ($voucherActivitiesCollection as $activity) {
                $this->getVoucherActivities()->offsetSet($activity->getId(), $activity->getName());
            }
        }
    }

    protected function loadAllActivities() {
        $activitiesCollection = $this->getActivityRepository()->getAllActivities();

        if (count($activitiesCollection) > 0)
        {
            foreach ($activitiesCollection as $activity) {
                $this->getAllActivities()->offsetSet($activity->getId(), $activity->getName());
            }
        }
    }

    protected function loadTodayActivities() {
        $activitiesCollection = $this->getActivityRepository()->getTodayActivities();

        if (count($activitiesCollection) > 0)
        {
            foreach ($activitiesCollection as $activity) {
                $this->getTodayActivities()->offsetSet($activity->getId(), $this->getLabel($activity));
            }
        }
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

    protected function getLabel(Activity $activity) {
        $name = $activity->getName();

        $events = $activity->getEvents();

        foreach ($events as $event) {
            /** @var Event $event * */
            if ($event->getDayOfWeek() === strtolower(date("l")))
            {
                $start = $event->getStartHour();
                $end = $event->getEndHour();
                return sprintf("%s (%s-%s)", $name, $start, $end);
            }
        }

        return $name;
    }

}
