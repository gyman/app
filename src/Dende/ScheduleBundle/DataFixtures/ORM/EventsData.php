<?php

namespace Dende\MembersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dende\ScheduleBundle\Entity as Schedule;
use Symfony\Component\Yaml\Yaml;
use DateTime;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class EventsData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    private $manager;

    public function load(ObjectManager $manager) {
        $this->manager = $manager;

        $value = Yaml::parse(file_get_contents(__DIR__ . '/../Yaml/events.yml'));

        foreach ($value as $key => $params) {
            $event = $this->insertEvent($params);
            $this->addReference($key, $event);
        }

        $this->manager->flush();
    }

    public function getOrder() {
        return 200;
    }

    private function insertEvent($params) {
        extract($params);

        switch ($type) {
            case "single":
                $event = new Schedule\Single();
                break;
            case "weekly":
                $event = new Schedule\Weekly();
                break;
        }

        $event->setActivity($this->getReference($activity));
        $event->setStartDate(new DateTime($startDate));
        $event->setEndDate(isset($endDate) ? new DateTime($endDate) : new DateTime("2015-12-31 23:59:59"));

        $event->setDuration($duration);

        if ($event instanceof Schedule\Weekly)
        {
            $event->setSunday(isset($sunday) ? $sunday : false);
            $event->setMonday(isset($monday) ? $monday : false);
            $event->setTuesday(isset($tuesday) ? $tuesday : false);
            $event->setWednesday(isset($wednesday) ? $wednesday : false);
            $event->setThursday(isset($thursday) ? $thursday : false);
            $event->setFriday(isset($friday) ? $friday : false);
            $event->setSaturday(isset($saturday) ? $saturday : false);
        }

        $this->manager->persist($event);

         $this->container->get('occurences_manager')->addOccurencesForEvent($event);

        return $event;
    }

}
