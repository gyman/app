<?php

namespace Dende\ScheduleBundle\Services;

use Symfony\Component\DependencyInjection\Container;
use Dende\ScheduleBundle\Entity\Occurence;
use \DateTime;

class Schedule {

    /**
     * Dependency Container
     * @var Container 
     */
    private $container;

    public function setContainer(Container $container) {
        $this->container = $container;
        return $this;
    }

    /**
     * Prepares data to display on dashboard
     * Occurences [activityName, startDate, endDate, entriesCount]
     * @return array
     */
    public function getTodayEventsForDashboard() {
        $occurenceRepository = $this->container->get("occurence_repository");

        $start = new \DateTime("today 00:00:00");
        $end = new \DateTime("today 23:59:59");

        $occurences = $occurenceRepository->getOccurencesForPeriod($start, $end);

        $result = [];

        if (count($occurences) == 0)
        {
            return $result;
        }

        foreach ($occurences as $occurence) {
            /**
             * @var $occurence Occurence
             */
            $result[] = [
                "activityName" => $occurence->getEvent()->getActivity()->getName(),
                "startDate"    => $occurence->getStartDate(),
                "endDate"      => $occurence->getEndDate(),
                "entriesCount" => count($occurence->getEntries()),
            ];
        }

        return $result;
    }

    /**
     * Prepares data to display on EntryModal on event selector
     * @param type $timestamp
     */
    public function getEventsForEntryEventSelector($timestamp) {
        $occurenceRepository = $this->container->get("occurence_repository");

        $start = DateTime::createFromFormat('U', $timestamp);
        $end = DateTime::createFromFormat('U', $timestamp);

        $start->modify("00:00:00");
        $end->modify("23:59:59");

        $occurences = $occurenceRepository->getOccurencesForPeriod($start, $end);

        $result = [];

        if (count($occurences) == 0)
        {
            return $result;
        }

        foreach ($occurences as $occurence) {
            /**
             * @var $occurence Occurence
             */
            $result[] = [
                "id"           => $occurence->getId(),
                "activityName" => $occurence->getEvent()->getActivity()->getName(),
                "startDate"    => $occurence->getStartDate(),
                "endDate"      => $occurence->getEndDate()
            ];
        }

        return $result;
    }

}
