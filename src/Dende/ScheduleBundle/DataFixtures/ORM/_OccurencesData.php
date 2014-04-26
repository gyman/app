<?php

namespace Dende\MembersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dende\ScheduleBundle\Entity as Schedule;
use Symfony\Component\Yaml\Yaml;
use DateTime;

class OccurencesData extends AbstractFixture implements OrderedFixtureInterface {

    private $manager;

    public function load(ObjectManager $manager) {
//        $this->manager = $manager;
//
//        $value = Yaml::parse(file_get_contents(__DIR__ . '/../Yaml/occurences.yml'));
//
//        foreach ($value as $key => $params) {
//            $eventMetaObject = $this->insertEventMeta($params);
//            $this->addReference($key, $eventMetaObject);
//        }
//
//        $this->manager->flush();
    }

    public function getOrder() {
        return 210;
    }

    private function insertEventMeta($params) {
        extract($params);

        switch ($type) {
            case "deleted":
                $eventMeta = new Schedule\Deleted();
                break;
            case "description":
                $eventMeta = new Schedule\Description();
                break;
        }

        $event = $this->getReference($eventReference);

        $eventMeta->setEvent($event);
        $eventMeta->setStartDate(new \DateTime($startDate));
        $eventMeta->setKey($key);
        $eventMeta->setValue($value);

        $this->manager->persist($eventMeta);

        return $eventMeta;
    }

}
