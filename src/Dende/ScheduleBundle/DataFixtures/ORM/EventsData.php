<?php

namespace Dende\MembersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dende\ScheduleBundle\Entity as Schedule;
use Symfony\Component\Yaml\Yaml;
use DateTime;

class EventsData extends AbstractFixture implements OrderedFixtureInterface {

    private $manager;

    public function load(ObjectManager $manager) {
        $this->manager = $manager;

        $value = Yaml::parse(file_get_contents(__DIR__ . '/../Yaml/events.yml'));

        foreach ($value as $key => $params) {
            $activityObject = $this->insertActivity($params);
            $this->addReference($key, $activityObject);
        }

        $this->manager->flush();
    }

    public function getOrder() {
        return 200;
    }

    private function insertActivity($params) {
        extract($params);

        switch ($type) {
            case "recurring":
                $event = new Schedule\RecurringEvent();
                break;
        }

        $event->setActivity($this->getReference($activity));
        $event->setStartDate(new DateTime($startDate));
        $event->setDuration($duration);
        $event->setInterval($interval);

        if (isset($endDate))
        {
            $event->setEndDate(new DateTime($endDate));
        }

        $this->manager->persist($event);


        return $event;
    }

}
