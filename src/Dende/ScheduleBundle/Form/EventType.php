<?php

namespace Dende\ScheduleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('activity', "entity", [
                    "label"       => "Zajęcia",
                    'class'       => 'ScheduleBundle:Activity',
                    'property'    => 'name',
                    "empty_value" => "wybierz...",
                    "empty_data"  => null,
                ])
                ->add('new_activity', "text", [
                    "label"  => "Nazwa zajęć",
                    "mapped" => false
                ])
                ->add('startDate', "datetime", [
                    "widget"       => "single_text",
                    "format"       => "dd.MM.yyyy hh:mm",
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
                ->add('recurrence', "choice", array(
                    "choices"  => [
                        "weekly" => "co tydzień",
                        "single" => "nie",
                    ],
                    "mapped"   => false,
                    "label"    => "Powtarza się",
                    "expanded" => true,
                    "multiple" => false,
                    "data"     => "weekly"
                ))
                ->add('days', "choice", array(
                    "choices"  => [
                        1 => "poniedziałek",
                        2 => "wtorek",
                        3 => "środa",
                        4 => "czwartek",
                        5 => "piątek",
                        6 => "sobota",
                        0 => "niedziela",
                    ],
                    "data"     => range(1, 5),
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
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Dende\ScheduleBundle\Entity\Event'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'dende_schedulebundle_event';
    }

}
