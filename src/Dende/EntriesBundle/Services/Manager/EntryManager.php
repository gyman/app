<?php

namespace Dende\EntriesBundle\Services\Manager;

use Dende\EntriesBundle\Entity\Entry;

class EntryManager {

    /**
     * 
     * @return \Dende\EntriesBundle\Entity\Entry
     */
    public function createNewEntry() {
        $entry = new Entry();

        $entry->setEntryPrice(15);
        $entry->setStartDate(new \DateTime());
        return $entry;
    }

}
