<?php

namespace Gyman\Component\CoreDomain\Repository;

use Gyman\Component\CoreDomain\Event\DomainEventInterface;

/**
 * Class InMemoryDomainEventRepository
 * @package Gyman\Component\CoreDomain
 */
class InMemoryDomainEventRepository implements DomainEventRepositoryInterface
{
    /**
     * @var DomainEventInterface[]
     */
    private $events = [];

    /**
     * @return DomainEventInterface[]
     */
    public function findAll()
    {
        return $this->events;
    }

    /**
     * @param DomainEventInterface $event
     * @return null
     */
    public function insert(DomainEventInterface $event)
    {
        $this->events[] = $event;
    }
}
