<?php

namespace Dende\ScheduleBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Dende\ScheduleBundle\Entity\Event;
use Doctrine\Common\Persistence\ObjectManager;
use Dende\ScheduleBundle\Entity\EventRepository;

class EventTransformer implements DataTransformerInterface {

    /**
     * @var eventRepository
     */
    private $eventRepository;

    /**
     * @param ObjectManager $om
     */
    public function __construct(EventRepository $repository) {
        $this->eventRepository = $repository;
    }

    /**
     * 
     * @param Event $event
     * @return string
     */
    public function transform($event = null) {
        if ($event)
        {
            return $event->getId();
        }
    }

    /**
     * 
     * @param string $id
     * @return Activity | null
     */
    public function reverseTransform($id = null) {
        if (is_numeric($id))
        {
            return $this->eventRepository->findOneById($id);
        }
    }

}
