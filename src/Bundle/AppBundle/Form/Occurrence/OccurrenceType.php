<?php

namespace Gyman\Bundle\AppBundle\Form\Occurrence;

use DateTime;
use Gyman\Bundle\AppBundle\Repository\OccurrenceRepository;
use Gyman\Domain\Calendar;
use Gyman\Domain\Calendar\Event\Occurrence;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OccurrenceType extends EntityType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $start = (new DateTime())->modify("00:00:00");
        $end = (new DateTime())->modify("23:59:59");

        $resolver->setDefaults([
            'csrf_protection' => true,
            'class' => Occurrence::class,
            'required' => true,
            'label' => 'entries.form.occurrence.label',
            'multiple' => false,
            'expanded' => true,
            'choice_label' => function (Occurrence $occurrence) {
                $start = $occurrence->startDate()->format("H:i");
                $stop = $occurrence->endDate()->format("H:i");
                $activity = $occurrence->event()->title();

                /** @var Calendar $calendar */
                $calendar = $occurrence->event()->calendar();

                return sprintf("%s-%s %s (%s)", $start, $stop, $activity, $calendar->title());
            },
            'choice_value' => 'id',
            'query_builder' => function(OccurrenceRepository $repository) use ($start, $end) {
                return $repository->createQueryBuilder('o')
                    ->where('o.occurrenceData.startDate >= :start')
                    ->andWhere('o.occurrenceData.endDate <= :end')
                    ->orderBy('o.occurrenceData.startDate', 'ASC')
                    ->setParameters([
                        'start' => $start,
                        'end'   => $end,
                    ]);
            },
            "em" => "tenant"
        ]);
    }

    public function getBlockPrefix() : string
    {
        return 'occurrence';
    }
}
