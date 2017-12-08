<?php
namespace Gyman\Application\Repository;

use Gyman\Application\Event\DomainEventInterface;

/**
 * Class InMemoryDomainEventRepository
 * @package Gyman\Domain
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
