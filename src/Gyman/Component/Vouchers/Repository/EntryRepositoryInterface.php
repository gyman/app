<?php
namespace Gyman\Component\Vouchers\Repository;

use Gyman\Component\CoreDomain\Repository\RepositoryInterface;
use Gyman\Component\Vouchers\Model\Entry;

/**
 * Interface EntryRepositoryInterface
 * @package Gyman\Component\Vouchers
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
