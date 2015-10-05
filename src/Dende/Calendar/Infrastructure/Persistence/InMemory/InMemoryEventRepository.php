<?php
namespace Dende\Calendar\Infrastructure\Persistence\InMemory;

use Dende\Calendar\Domain\Calendar\Event;
use Dende\Calendar\Domain\Repository\EventRepositoryInterface;
use Dende\Calendar\Infrastructure\Persistence\InMemoryEventSpecificationInterface;

class InMemoryEventRepository implements EventRepositoryInterface
{
    /**
     * @var Event[]
     */
    private $events = [];

    /**
     * @return Event[]
     */
    public function findAll()
    {
        return $this->events;
    }

    /**
     * @param Event $event
     * @return null
     */
    public function insert($event)
    {
        $this->events[$event->id()->id()] = $event;
    }

    /**
     * @param InMemoryEventSpecificationInterface $specification
     * @return array
     */
    public function query(InMemoryEventSpecificationInterface $specification)
    {
        return $this->filterEvents(
            function (Event $event) use ($specification) {
                return $specification->specifies($event);
            }
        );
    }

    private function filterEvents(callable $callback)
    {
        $result = array_values(array_filter($this->events, $callback));

        usort($result, function (Event $a, Event $b) {
            return $a->startDate() < $b->startDate() ? -1 : 1;
        });

        return $result;
    }
}
