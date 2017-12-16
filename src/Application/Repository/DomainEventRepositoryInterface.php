<?php
namespace Gyman\Application\Repository;

use Gyman\Application\Event\DomainEventInterface;

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
