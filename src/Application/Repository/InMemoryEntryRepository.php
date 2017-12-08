<?php
namespace Gyman\Application\Repository;

use Gyman\Domain\Entry;
use \Exception;
use Traversable;

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

    public function save($entry)
    {
        if($entry instanceof Entry) {
                $this->insert($entry);
            return;
        } elseif(is_array($entry) || $entry instanceof Traversable) {
            /** @var Entry $entry */
            foreach($entry as $entryElement) {
                $this->insert($entryElement);
            }
            return;
        }

        throw new Exception("Uknown type");
    }
}
