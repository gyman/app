<?php
namespace Gyman\Domain\Repository;

use Gyman\Domain\Model\Entry;

/**
 * Class InMemoryEntryRepository
 * @package Gyman\Component\Entrys
 */
class InMemoryEntryRepository implements EntryRepositoryInterface
{
    /**
     * @var Entry[]
     */
    private $entries = [];

    /**
     * @return Entry[]
     */
    public function findAll()
    {
        return $this->entries;
    }

    /**
     * @param Entry $entry
     * @return null
     */
    public function remove(Entry $entry)
    {
        $this->entries = array_filter($this->entries, function ($element) use ($entry) {
            if ($entry === $element) {
                return false;
            }

            return true;
        });
    }

    /**
     * @param Entry $entry
     * @return null
     */
    public function insert(Entry $entry)
    {
        $this->entries[] = $entry;
    }
}
