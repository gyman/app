<?php
namespace Gyman\Application\Repository;

use Gyman\Domain\Entry;

/**
 * Interface EntryRepositoryInterface
 * @package Gyman\Domain
 */
interface EntryRepositoryInterface extends RepositoryInterface
{
    /**
     * @return Entry[]
     */
    public function findAll();

    /**
     * @param Entry $entry
     */
    public function remove(Entry $entry);

    /**
     * @param Entry $entry
     */
    public function insert(Entry $entry);
}
