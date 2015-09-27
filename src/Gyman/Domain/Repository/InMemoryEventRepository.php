<?php
namespace Gyman\Domain\Repository;

use Gyman\Domain\Model\EmailAddress;
use Gyman\Domain\Model\Event;

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
        $this->events[] = $event;
    }
}
