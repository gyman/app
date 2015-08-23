<?php

namespace Gyman\Component\CoreDomain\Repository;

use Gyman\Component\CoreDomain\Event\DomainEventInterface;

/**
 * Interface DomainEventRepositoryInterface
 * @package Gyman\Component\CoreDomain
 */
interface DomainEventRepositoryInterface extends RepositoryInterface
{
    /**
     * @return DomainEventInterface[]
     */
    public function findAll();

    /**
     * @param DomainEventInterface $event
     * @return null
     */
    public function insert(DomainEventInterface $event);
}
