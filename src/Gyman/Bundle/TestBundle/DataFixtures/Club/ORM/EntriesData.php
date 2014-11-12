<?php

namespace Gyman\Bundle\TestBundle\DataFixtures\Club\ORM;

use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Gyman\Bundle\TestBundle\DataFixtures\BaseFixture;

class EntriesData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return 300;
    }

    public function insert($params)
    {
        extract($params);

        $entry = new Entry();
        $entry->setVoucher($this->getReference($voucher));
        $entry->setEntryType($entryType);
        $entry->setMember($this->getReference($member));

        return $entry;
    }
}
