<?php

namespace Dende\EntriesBundle\Services\Manager;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\QueryBuilder;
use Dende\EntriesBundle\Entity\Entry;
use Dende\EntriesBundle\Entity\EntryRepository;
use Dende\DefaultBundle\Services\Manager\BaseManager;

class EntryManager extends BaseManager {

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
