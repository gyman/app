<?php

namespace Gyman\Bundle\TestBundle\DataFixtures\Club\ORM;

use Gyman\Bundle\ScheduleBundle\Entity as Schedule;
use DateTime;
use Gyman\Bundle\TestBundle\DataFixtures\BaseFixture;

class EventsData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return 200;
    }

    public function insert($params)
    {
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

        if ($event instanceof Schedule\Weekly) {
            $event->setSunday(isset($sunday) ? $sunday : false);
            $event->setMonday(isset($monday) ? $monday : false);
            $event->setTuesday(isset($tuesday) ? $tuesday : false);
            $event->setWednesday(isset($wednesday) ? $wednesday : false);
            $event->setThursday(isset($thursday) ? $thursday : false);
            $event->setFriday(isset($friday) ? $friday : false);
            $event->setSaturday(isset($saturday) ? $saturday : false);
        }

        $this->container->get('occurences_manager')->addOccurencesForEvent($event);

        return $event;
    }
}
