<?php

namespace Gyman\Bundle\EntriesBundle\Services\Manager;

use Gyman\Bundle\EntriesBundle\Entity\Entry;

class EntryManager
{
    /**
     *
     * @return \Gyman\Bundle\EntriesBundle\Entity\Entry
     */
    public function createNewEntry()
    {
        $entry = new Entry();

        $entry->setEntryPrice(15);
        $entry->setStartDate(new \DateTime());

        return $entry;
    }
}
