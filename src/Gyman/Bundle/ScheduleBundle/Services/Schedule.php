<?php
namespace Gyman\Bundle\ScheduleBundle\Services;

use DateTime;
use Gyman\Bundle\ScheduleBundle\Entity\Occurence;
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
     * Occurences [activityName, startDate, endDate, entriesCount]
     * @return array
     */
    public function getOccurencesForDashboard(DateTime $date)
    {
        $occurenceRepository = $this->container->get('occurence_repository');

        $start = clone($date);
        $start->modify('00:00:00');
        $end = clone($date);
        $end->modify('23:59:59');

        $occurences = $occurenceRepository->getOccurencesForPeriod($start, $end);

        $result = [];

        if (count($occurences) == 0) {
            return $result;
        }

        return $occurences;
    }

    /**
     * Prepares data to display on EntryModal on event selector
     * @param type $date
     */
    public function getEventsForEntryEventSelector(\DateTime $date)
    {
        $occurenceRepository = $this->container->get('occurence_repository');

        $start = clone($date);
        $end = clone($date);

        $start->modify('00:00:00');
        $end->modify('23:59:59');

        $occurences = $occurenceRepository->getOccurencesForPeriod($start, $end);

        $result = [];

        if (count($occurences) == 0) {
            return $result;
        }

        foreach ($occurences as $occurence) {
            /**
             * @var $occurence Occurence
             */
            $result[] = [
                'id'           => $occurence->getId(),
                'activityName' => $occurence->getEvent()->getActivity()->getName(),
                'startDate'    => $occurence->getStartDate(),
                'endDate'      => $occurence->getEndDate(),
            ];
        }

        return $result;
    }
}
