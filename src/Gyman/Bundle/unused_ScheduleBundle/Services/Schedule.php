<?php
namespace Gyman\Bundle\ScheduleBundle\Services;

use DateTime;
use Gyman\Bundle\ScheduleBundle\Entity\Occurrence;
use Symfony\Component\DependencyInjection\Container;

class Schedule
{
    /**
     * Dependency Container
     * @var Container
     */
    private $container;

    public function setContainer(Container $container)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * Prepares data to display on dashboard
     * Occurrences [activityName, startDate, endDate, entriesCount]
     * @return array
     */
    public function getOccurrencesForDashboard(DateTime $date)
    {
        $occurrenceRepository = $this->container->get('occurrence_repository');

        $start = clone($date);
        $start->modify('00:00:00');
        $end = clone($date);
        $end->modify('23:59:59');

        $occurrences = $occurrenceRepository->getOccurrencesForPeriod($start, $end);

        $result = [];

        if (count($occurrences) == 0) {
            return $result;
        }

        return $occurrences;
    }

    /**
     * Prepares data to display on EntryModal on event selector
     * @param type $date
     */
    public function getEventsForEntryEventSelector(\DateTime $date)
    {
        $occurrenceRepository = $this->container->get('occurrence_repository');

        $start = clone($date);
        $end = clone($date);

        $start->modify('00:00:00');
        $end->modify('23:59:59');

        $occurrences = $occurrenceRepository->getOccurrencesForPeriod($start, $end);

        $result = [];

        if (count($occurrences) == 0) {
            return $result;
        }

        foreach ($occurrences as $occurrence) {
            /**
             * @var $occurrence Occurrence
             */
            $result[] = [
                'id'           => $occurrence->getId(),
                'activityName' => $occurrence->getEvent()->getActivity()->getName(),
                'startDate'    => $occurrence->getStartDate(),
                'endDate'      => $occurrence->getEndDate(),
            ];
        }

        return $result;
    }
}
