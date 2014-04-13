<?php

namespace Dende\ScheduleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $entity = $event->getData();
            $form = $event->getForm();

            if ($entity && !is_null($entity->getId()))
            {
                $form->add('editType', "choice", array(
                    "choices"  => [
                        "serial" => "wszystkie następne",
                        "singular"   => "tylko to wystąpienie",
                    ],
                    "mapped"   => false,
                    "label"    => "Edytuj",
                    "expanded" => true,
                    "multiple" => false,
                ))->add('description', "textarea", [
                    "label"  => "Opis",
                    "mapped" => false,
                    "attr"   => [
                        "placeholder" => "opis zajęć"
                    ]
                ]);
            }
        });

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
            ->add('eventType', "choice", array(
                "choices"    => [
                    "weekly" => "co tydzień",
                    "single" => "nie",
                ],
                "mapped"     => false,
                "label"      => "Powtarza się",
                "expanded"   => true,
                "multiple"   => false,
                "empty_data" => "weekly"
            ))
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
            ->add('endDate', "date", [
                "widget" => "single_text",
                "format" => "dd.MM.yyyy",
                "label"  => "Data zakończenia",
                "attr"   => [
                    "placeholder" => "dd.mm.yyyy"
                ]
            ])
            ->add('days', "choice", array(
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
            ))
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

}
