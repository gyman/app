<?php

namespace Dende\ScheduleBundle\Services\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Acme\StoreBundle\Entity\Product;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Dende\ScheduleBundle\Entity as Entity;
use Doctrine\Common\Collections\ArrayCollection;

class EventInsertListener {

    /**
     *
     * @var EntityManager 
     */
    private $entityManager;
    private $weekdays = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];

    public function postPersist(LifecycleEventArgs $args) {
        $this->entityManager = $args->getEntityManager();
        $entity = $args->getEntity();

        if (false == ($entity instanceof Entity\Weekly))
        {
            return;
        }

        $this->insertOccurences($entity);

        $this->entityManager->persist($entity);

        $uow = $this->entityManager->getUnitOfWork();
        $md = $this->entityManager->getClassMetadata("Dende\ScheduleBundle\Entity\Weekly");
        $uow->recomputeSingleEntityChangeSet($md, $entity);
    }

    public function insertOccurences(Entity\Weekly $event) {
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

    public function getDays(Entity\Weekly $event) {
        $days = [];

        foreach ($this->weekdays as $day) {
            $method = "get" . ucfirst($day);

            if (!method_exists($event, $method))
            {
                throw new Exception("Event has no $method() method!");
            }

            if (is_null($event->$method()) || $event->$method() === false)
            {
                continue;
            }

            $days[] = $day;
        }

        return $days;
    }

}
