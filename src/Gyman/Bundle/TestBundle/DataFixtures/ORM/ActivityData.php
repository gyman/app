<?php

namespace Gyman\Bundle\TestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gyman\Bundle\ScheduleBundle\Entity\Activity;
use Symfony\Component\Yaml\Yaml;

class ActivityData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $value = Yaml::parse(file_get_contents(__DIR__.'/../Yaml/activities.yml'));

        foreach ($value as $key => $params) {
            $activityObject = $this->insertActivity($params);
            $this->addReference($key, $activityObject);
        }
    }

    public function getOrder()
    {
        return 3;
    }

    private function insertActivity($params)
    {
        extract($params);

        $activity = new Activity();
        $activity->setName($name);

        $this->manager->persist($activity);
        $this->manager->flush();

        return $activity;
    }
}
