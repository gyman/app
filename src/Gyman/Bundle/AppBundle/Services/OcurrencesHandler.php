<?php
namespace Gyman\AppBundle\Services;

use Gyman\Bundle\ScheduleBundle\Entity as Entity;

class OcurrencesHandler
{
    public function addOccurencesForEvent(Entity\Event $event)
    {
        if ($event instanceof Entity\Single) {
            $this->insertSingleOccurence($event);
        }

        if ($event instanceof Entity\Weekly) {
            $this->insertWeeklyOccurences($event);
        }
    }

    private function insertWeeklyOccurences(Entity\Weekly $event)
    {
        $days = $this->getDays($event);

        if ($occurence = $this->getOccurence()) {
            $startDate = clone($occurence->getStartDate());
        } else {
            $startDate = clone($event->getStartDate());
        }

        $hour = $event->getStartDate()->format('H:i');

        $this->setupDaysArrayToNearestDay($startDate, $days);

        while ($startDate->getTimestamp() <= $event->getEndDate()->getTimestamp()) {
            $day = current($days) == false ? reset($days) : current($days);
            $occurence = new Entity\Serial();

            $newStartDate = clone($startDate->modify(sprintf('%s %s', $day, $hour)));
            $startDate->modify('+1 day');
            $occurence->setStartDate($newStartDate);
            $occurence->setDuration($event->getDuration());
            $occurence->setEvent($event);

            $this->getEntityManager()->persist($occurence);

            next($days);
        }
    }

    private function insertSingleOccurence(Entity\Single $event)
    {
        $startDate = clone($event->getStartDate());
        $collection = new ArrayCollection();

        $occurence = new Entity\Singular();
        $occurence->setStartDate($startDate);
        $occurence->setDuration($event->getDuration());
        $occurence->setEvent($event);

        if ($form = $this->getForm()) {
            $occurence->setDescription($form->get('description')->getData());
        }

        $collection->add($occurence);

        $event->setOccurences($collection);
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

    public function updateOccurencesForEvent(Entity\Event $event, Entity\Occurence $editedOccurence, Form $form)
    {
        $this->setForm($form);

        if ($editedOccurence->isPast()) {
            throw new \Exception('Cannot edit past occurences');
        }

        $this->setOccurence($editedOccurence);

        $startDate = $editedOccurence->getStartDate();

        $qb = $this->getEntityManager()->createQueryBuilder();

        $qb->delete()
            ->from('ScheduleBundle:Occurence', 'o')
            ->where('o.event = :event')
            ->andWhere('o.startDate >= :start')
            ->setParameters([
                'event' => $event,
                'start' => $startDate,
            ]);

        $qb->getQuery()->execute();

        if ($event instanceof Entity\Single) {
            $this->insertSingleOccurence($event);
        } elseif ($event instanceof Entity\Weekly) {
            $this->insertWeeklyOccurences($event);
        }
    }
}