<?php

namespace Gyman\Bundle\ScheduleBundle\Services\Subscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;

class ScheduleEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
//            'postUpdate',
//            'postDelete',
        );
    }

    /**
     *
     * @var EntityManager
     */
    private $entityManager;
    private $weekdays = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];

    public function prePersist(LifecycleEventArgs $args)
    {
        $this->entityManager = $args->getEntityManager();
        $entity = $args->getEntity();

        if (false == ($entity instanceof Entity\Weekly)) {
            return;
        }

        $this->insertOccurences($entity);

        $this->entityManager->persist($entity);

        $uow = $this->entityManager->getUnitOfWork();
        $md = $this->entityManager->getClassMetadata("Gyman\Bundle\ScheduleBundle\Entity\Weekly");
        $uow->recomputeSingleEntityChangeSet($md, $entity);
    }

    private function insertOccurences(Entity\Weekly $event)
    {
        $days = $this->getDays($event);
        $startDate = clone($event->getStartDate());
        $collection = new ArrayCollection();

        while ($startDate->getTimestamp() <= $event->getEndDate()->getTimestamp()) {
            $day = current($days) == false ? reset($days) : current($days);
            $occurence = new Entity\Serial();
            $occurence->setStartDate(clone($startDate->modify("next " . $day)));
            $occurence->setDuration($event->getDuration());

            $this->entityManager->persist($occurence);

            $collection->add($occurence);
            next($days);
        }

        $event->setOccurences($collection);
    }

    private function getDays(Entity\Weekly $event)
    {
        $days = [];

        foreach ($this->weekdays as $day) {
            $method = "get" . ucfirst($day);

            if (!method_exists($event, $method)) {
                throw new Exception("Event has no $method() method!");
            }

            if (is_null($event->$method()) || $event->$method() === false) {
                continue;
            }

            $days[] = $day;
        }

        return $days;
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
    }

    public function postDelete(LifecycleEventArgs $args)
    {
    }

    protected function updateEvents()
    {
    }
}
