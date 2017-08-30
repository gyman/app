<?php
namespace Gyman\Bundle\AppBundle\Services;

use Gyman\Bundle\ScheduleBundle\Entity as Entity;
use Gyman\Bundle\ScheduleBundle\Entity\OccurrenceRepository;

class OcurrencesHandler
{
    /**
     * @var OccurrenceRepository
     */
    public $occurrenceRepository;

    public function addOccurrencesForEvent(Entity\Event $event)
    {
        if ($event instanceof Entity\Single) {
            $this->insertSingleOccurrence($event);
        }

        if ($event instanceof Entity\Weekly) {
            $this->insertWeeklyOccurrences($event);
        }
    }

    private function insertWeeklyOccurrences(Entity\Weekly $event)
    {
        $days = $this->getDays($event);

        if ($occurrence = $this->getOccurrence()) {
            $startDate = clone($occurrence->getStartDate());
        } else {
            $startDate = clone($event->getStartDate());
        }

        $hour = $event->getStartDate()->format('H:i');

        $this->setupDaysArrayToNearestDay($startDate, $days);

        while ($startDate->getTimestamp() <= $event->getEndDate()->getTimestamp()) {
            $day = current($days) == false ? reset($days) : current($days);
            $occurrence = new Entity\Serial();

            $newStartDate = clone($startDate->modify(sprintf('%s %s', $day, $hour)));
            $startDate->modify('+1 day');
            $occurrence->setStartDate($newStartDate);
            $occurrence->setDuration($event->getDuration());
            $occurrence->setEvent($event);

            $this->occurrenceRepository->insert($occurrence);

            next($days);
        }
    }

    private function insertSingleOccurrence(Entity\Single $event)
    {
        $startDate = clone($event->getStartDate());
        $collection = new ArrayCollection();

        $occurrence = new Entity\Singular();
        $occurrence->setStartDate($startDate);
        $occurrence->setDuration($event->getDuration());
        $occurrence->setEvent($event);

        if ($form = $this->getForm()) {
            $occurrence->setDescription($form->get('description')->getData());
        }

        $collection->add($occurrence);

        $event->setOccurrences($collection);
    }

    private function setupDaysArrayToNearestDay(\DateTime $startDate, array &$days)
    {
        $currentDayNumber = (int) $startDate->format('N') - 1;

        while (current($days)) {
            $weekdayNumber = key($days);
            if ($weekdayNumber >= $currentDayNumber) {
                break;
            }
            next($days);
        }
    }

    private function getDays(Entity\Weekly $event)
    {
        $days = [];

        if ($form = $this->getForm()) {
            return $form['days']->getData();
        }

        foreach ($this->weekdays as $i => $day) {
            $method = 'get' . ucfirst($day);

            if (!method_exists($event, $method)) {
                throw new Exception("Event has no $method() method!");
            }

            if (is_null($event->$method()) || $event->$method() === false) {
                continue;
            }

            $days[$i] = $day;
        }

        return $days;
    }

    public function updateOccurrencesForEvent(Entity\Event $event, Entity\Occurrence $editedOccurrence, Form $form)
    {
        $this->setForm($form);

        if ($editedOccurrence->isPast()) {
            throw new \Exception('Cannot edit past occurrences');
        }

        $this->setOccurrence($editedOccurrence);

        $startDate = $editedOccurrence->getStartDate();

        $qb = $this->getEntityManager()->createQueryBuilder();

        $qb->delete()
            ->from('ScheduleBundle:Occurrence', 'o')
            ->where('o.event = :event')
            ->andWhere('o.startDate >= :start')
            ->setParameters([
                'event' => $event,
                'start' => $startDate,
            ]);

        $qb->getQuery()->execute();

        if ($event instanceof Entity\Single) {
            $this->insertSingleOccurrence($event);
        } elseif ($event instanceof Entity\Weekly) {
            $this->insertWeeklyOccurrences($event);
        }
    }
}
