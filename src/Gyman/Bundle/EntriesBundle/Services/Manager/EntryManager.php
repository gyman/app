<?php

namespace Gyman\Bundle\EntriesBundle\Services\Manager;

use Gyman\Bundle\BaseBundle\EntityManager\BaseManager;
use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Gyman\Bundle\EntriesBundle\EntriesEvents;
use Gyman\Bundle\EntriesBundle\Event\EntryCreatedEvent;

class EntryManager extends BaseManager
{
    /**
     * @return \Gyman\Bundle\EntriesBundle\Entity\Entry
     */
    public function createNewEntry()
    {
        $entry = new Entry();

        $entry->setEntryPrice(15);
        $entry->setStartDate(new \DateTime());

        return $entry;
    }

    /**
     * @param Entry $object
     * @param bool $withFlush
     */
    public function save($object, $withFlush = true)
    {
        $isNew = $object->getId() == null ? true : false;

        parent::save($object, $withFlush);

        if ($isNew) {
            $this->dispatcher->dispatch(EntriesEvents::CREATED, new EntryCreatedEvent($object));
        } else {
//            $this->dispatcher->dispatch(EntriesEvents::EDITED, new EntryCreatedEvent($object));
        }


    }
}
