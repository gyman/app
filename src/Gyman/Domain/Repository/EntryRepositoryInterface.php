<?php
namespace Gyman\Domain\Repository;

use Gyman\Domain\Model\Entry;

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
