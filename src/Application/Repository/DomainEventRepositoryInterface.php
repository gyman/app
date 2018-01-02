<?php

declare(strict_types=1);

namespace Gyman\Application\Repository;

use Gyman\Application\Event\DomainEventInterface;

/**
 * Interface DomainEventRepositoryInterface.
 */
interface DomainEventRepositoryInterface extends RepositoryInterface
{
    /**
     * @return DomainEventInterface[]
     */
    public function findAll();

    /**
     * @param DomainEventInterface $event
     */
    public function insert(DomainEventInterface $event);
}
