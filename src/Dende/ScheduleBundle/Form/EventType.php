<?php

namespace Dende\ScheduleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Dende\ScheduleBundle\Entity as Events;

class EventType extends AbstractType {

    /**
     *
     * @var Events\Occurence; 
     */
    private $occurence;

    public function getOccurence() {
        return $this->occurence;
    }

    public function setOccurence(Events\Occurence $occurence) {
        $this->occurence = $occurence;
        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, "setupFields"));

        $builder
            ->add('activity', "entity", [
                "label"       => "Zajęcia",
                'class'       => 'ScheduleBundle:Activity',
                'property'    => 'name',
                "empty_value" => "wybierz...",
                "empty_data"  => null,
            ])
            ->add('newActivity', "text", [
                "label"  => "Nazwa zajęć",
                "mapped" => false,
                "attr"   => [
                    "placeholder" => "wpisz nazwę nowych zajęć"
                ]
            ])
            ->add('startDate', "datetime", [
                "widget"       => "single_text",
                "format"       => "dd.MM.yyyy HH:mm",
                "with_minutes" => true,
                "with_seconds" => false,
                "label"        => "Data i godzina rozpoczęcia",
                "attr"         => [
                    "placeholder" => "dd.mm.yyyy hh:mm"
                ]
            ])
            ->add('duration', "number", [
                "label" => "Czas trwania (w minutach)",
            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
//    public function setDefaultOptions(OptionsResolverInterface $resolver) {
//        $resolver->setDefaults(array(
//            'data_class' => 'Dende\ScheduleBundle\Entity\Event'
//        ));
//    }

    /**
     * @return string
     */
    public function getName() {
        return 'dende_schedulebundle_event';
    }

    public function setupFields(FormEvent $event) {
        $entity = $event->getData();
        $form = $event->getForm();

        // editing (old) entity
        if ($entity && !is_null($entity->getId()))
        {
            // event is weekly
            if ($entity instanceof Events\Weekly)
            {
                // occurence is serial
                if ($this->getOccurence() instanceof Events\Serial)
                {
                    $form->add('editType', "choice", array(
                        "choices"  => [
                            "serial"   => "wszystkie następne",
                            "singular" => "tylko to wystąpienie",
                        ],
                        "mapped"   => false,
                        "label"    => "Edytuj",
                        "expanded" => true,
                        "multiple" => false,
                    ));
                }
                
                $this->setupEndDate($form);
                $this->setupDays($form);
            }

            $form->add('description', "textarea", [
                "label"  => "Opis",
                "mapped" => false,
                "attr"   => [
                    "placeholder" => "opis zajęć"
                ]
            ]);
        }
        else // new entity
        {
            $form->add('eventType', "choice", array(
                "choices"    => [
                    "weekly" => "co tydzień",
                    "single" => "nie",
                ],
                "mapped"     => false,
                "label"      => "Powtarza się",
                "expanded"   => true,
                "multiple"   => false,
                "empty_data" => "weekly"
            ));

            $this->setupDays($form);
            $this->setupEndDate($form);
        }
    }

    private function setupEndDate($form) {
        $form->add('endDate', "date", [
            "widget" => "single_text",
            "format" => "dd.MM.yyyy",
            "label"  => "Data zakończenia",
            "attr"   => [
                "placeholder" => "dd.mm.yyyy"
            ]
        ]);
    }

    private function setupDays($form) {
        $form->add('days', "choice", array(
            "choices"  => [
                "monday"    => "poniedziałek",
                "tuesday"   => "wtorek",
                "wednesday" => "środa",
                "thursday"  => "czwartek",
                "friday"    => "piątek",
                "saturday"  => "sobota",
                "sunday"    => "niedziela",
            ],
            "data"     => [
                "monday",
                "tuesday",
                "wednesday",
                "thursday",
                "friday",
            ],
            "multiple" => true,
            "expanded" => true,
            "mapped"   => false,
            "label"    => "Dni"
        ));
    }

}
