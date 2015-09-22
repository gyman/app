<?php
namespace Gyman\Domain\Repository;

use Gyman\Domain\Event\DomainEventInterface;

/**
 * Interface DomainEventRepositoryInterface
 * @package Gyman\Domain
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
