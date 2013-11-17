<?php

namespace Gyman\Bundle\ScheduleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormInterface;
use Gyman\Bundle\ScheduleBundle\Entity as Events;
use Gyman\Bundle\ScheduleBundle\Validator\AtLeastOneDaySelectedIfNotSingle;
use Symfony\Component\Validator\Constraints\NotBlank;

class EventType extends AbstractType
{
    /**
     *
     * @var Events\Occurence;
     */
    private $occurence;

    public function getOccurence()
    {
        return $this->occurence;
    }

    public function setOccurence(Events\Occurence $occurence)
    {
        $this->occurence = $occurence;

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, "setupConditionalFields"));

        $builder
            ->add('duration', "number", [
                "label" => "Czas trwania (w minutach)",
            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'validation_groups' => $this->getValidationGroupsCallback()
        ]);
    }

    private function setupStartDateFromEvent($form)
    {
        $form->add('startDate', "datetime", [
            "widget"       => "single_text",
            "format"       => "dd.MM.yyyy HH:mm",
            "with_minutes" => true,
            "with_seconds" => false,
            "label"        => "Data i godzina rozpoczęcia",
            "attr"         => [
                "placeholder" => "dd.mm.yyyy hh:mm",
                "readonly"    => "READONLY"
            ]
        ]);
    }

    /**
     * @return \Closure
     */
    private function getValidationGroupsCallback()
    {
        return function (FormInterface $form) {
            $validationGroups = array();

            /** @var Gyman\Bundle\ScheduleBundle\Entity\Event $entity */
            $event = $form->getData();

            if ($event->isNew()) {
                if ($form->getRoot()->has("eventType")) {
                    $eventType = $form->getRoot()->get("eventType")->getData();
                } else {
                    $eventType = Events\Event::SINGLE;
                }

                $validationGroups[] = "new";

                if ($eventType == Events\Event::WEEKLY) {
                    $validationGroups[] = "weekly";
                    $validationGroups[] = "notSingle";
                } elseif ($eventType == Events\Event::SINGLE) {
                    $validationGroups[] = "single";
                }
            } else {
                if ($form->getRoot()->has("editType")) {
                    $editType = $form->getRoot()->get("editType")->getData();
                } else {
                    $editType = Events\Occurence::SINGULAR;
                }

                $validationGroups[] = "edit";

                if ($editType == Events\Occurence::SERIAL) {
                    $validationGroups[] = "serial";
                    $validationGroups[] = "notSingle";
                } elseif ($editType == Events\Occurence::SINGULAR) {
                    $validationGroups[] = "singular";
                }
            }

            $this->validationGroupActivity($form, $validationGroups);

            return $validationGroups;
        };
    }

    private function validationGroupActivity(Form $form, array &$validationGroups)
    {
        if ($form->getRoot()->has("activity") && $form->getRoot()->has("newActivity")) {
            if ($form->getRoot()->get("newActivity")->getData() !== null) {
                $validationGroups[] = "newActivity";
            } else {
                $validationGroups[] = "dbActivity";
            }
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dende_schedulebundle_event';
    }

    /**
     * @param \Symfony\Component\Form\FormEvent $event
     */
    public function setupConditionalFields(FormEvent $formEvent)
    {
        $event = $formEvent->getData();
        $form = $formEvent->getForm();

        if ($event->isNew()) {
            $this->setupActivity($form);
            $this->setupEventType($form);
            $this->setupDays($form);
            $this->setupStartDateFromEvent($form);
            $this->setupEndDate($form);
        } else {
            if ($event->isWeekly()) {
                if ($this->isOccurenceSerial()) {
                    $this->setupEditType($form);
                    $this->setupEndDate($form);
                    $this->setupDays($form);
                }
            }

            $this->setupDescription($form);
            $this->setupStartDateFromEvent($form);
        }
    }

    private function isOccurenceSerial()
    {
        return $this->getOccurence() instanceof Events\Serial;
    }

    /**
     * @param \Symfony\Component\Form\Form $form
     */
    private function setupDescription(Form $form)
    {
        $form->add('description', "textarea", [
            "label"  => "Opis",
            "data"   => $this->getOccurence()->getDescription(),
            "mapped" => false,
            "attr"   => [
                "placeholder" => "opis zajęć"
            ]
        ]);
    }

    /**
     * @param \Symfony\Component\Form\Form $form
     */
    private function setupEditType(Form $form)
    {
        $form->add('editType', "choice", [
            "choices"     => [
                Events\Occurence::SERIAL   => "to wystąpienie i wszystkie następne",
                Events\Occurence::SINGULAR => "tylko to wystąpienie",
            ],
            "empty_data"  => Events\Occurence::SINGULAR,
            "mapped"      => false,
            "label"       => "Edytuj",
            "expanded"    => true,
            "multiple"    => false,
            "constraints" => [
                new NotBlank(["groups" => ["edit"]])
            ]
        ]);
    }

    /**
     * @param \Symfony\Component\Form\Form $form
     */
    private function setupEventType(Form $form)
    {
        $form->add('eventType', "choice", [
            "choices"     => [
                Events\Event::WEEKLY => "co tydzień",
                Events\Event::SINGLE => "nie",
            ],
            "mapped"      => false,
            "label"       => "Powtarza się",
            "expanded"    => true,
            "multiple"    => false,
            "empty_data"  => Events\Event::WEEKLY,
            "constraints" => [
                new NotBlank(["groups" => ["new"]])
            ]
        ]);
    }

    /**
     *
     * @param \Symfony\Component\Form\Form $form
     */
    private function setupActivity(Form $form)
    {
        $form->add('activity', "entity", [
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
        ]);
    }

    /**
     * @param \Symfony\Component\Form\Form $form
     */
    private function setupEndDate(Form $form)
    {
        $form->add('endDate', "date", [
            "widget" => "single_text",
            "format" => "dd.MM.yyyy",
            "label"  => "Data zakończenia",
            "attr"   => [
                "placeholder" => "dd.mm.yyyy",
                "readonly"    => "READONLY"
            ]
        ]);
    }

    /**
     * @param \Symfony\Component\Form\Form $form
     */
    private function setupDays(Form $form)
    {
        $form->add('days', "choice", [
            "choices"     => [
                "monday"    => "poniedziałek",
                "tuesday"   => "wtorek",
                "wednesday" => "środa",
                "thursday"  => "czwartek",
                "friday"    => "piątek",
                "saturday"  => "sobota",
                "sunday"    => "niedziela",
            ],
            "data"        => ["monday", "tuesday", "wednesday", "thursday", "friday"],
            "multiple"    => true,
            "expanded"    => true,
            "mapped"      => false,
            "label"       => "Dni",
            "constraints" => [
                new AtLeastOneDaySelectedIfNotSingle([
                    'groups' => ['notSingle']
                    ])
            ]
        ]);
    }
}
