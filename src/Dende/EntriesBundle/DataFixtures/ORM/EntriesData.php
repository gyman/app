<?php

namespace Dende\EntriesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dende\EntriesBundle\Entity\Entry;
use Symfony\Component\Yaml\Yaml;

class EntriesData extends AbstractFixture implements OrderedFixtureInterface {

    private $manager;

    public function load(ObjectManager $manager) {
        $this->manager = $manager;
        
        $value = Yaml::parse(file_get_contents(__DIR__.'/../Yaml/entries.yml'));
        
        foreach($value as $key => $params)
        {
            $entryObject = $this->insertEntry($params);
            $this->addReference($key, $entryObject);
        }
    }

    public function getOrder() {
        return 300;
    }

    private function insertEntry($params) {
        extract($params);

        $entry = new Entry();
        $entry->setActivity($this->getReference($activity));
        $entry->setVoucher($this->getReference($voucher));
        $entry->setEntryType($entryType);
        
        $this->manager->persist($entry);
        $this->manager->flush();

        return $entry;
    }

}
