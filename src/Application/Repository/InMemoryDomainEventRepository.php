<?php

declare(strict_types=1);

namespace Gyman\Application\Repository;

use Gyman\Application\Event\DomainEventInterface;

/**
 * Class InMemoryDomainEventRepository.
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
     */
    public function insert(DomainEventInterface $event)
    {
        $this->events[] = $event;
    }
}
