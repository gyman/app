<?php
namespace Gyman\Bundle\ScheduleBundle\Tests\Entity;

use Gyman\Bundle\ScheduleBundle\Entity\Event;
use Gyman\Bundle\ScheduleBundle\Entity\Serial;
use Gyman\Bundle\TestBundle\Tests\BaseTest;

class OccurenceRepositoryTest extends BaseTest
{
    public function testGetOccurrencesForPeriodQueryBuilder()
    {
        $startDate = new \DateTime();
        $startDate->modify('00:11:22');

        $endDate = clone($startDate);
        $endDate->modify('23:24:25');

        $query = $this->container->get('occurrence_repository')->getOccurrencesForPeriodQueryBuilder($startDate, $endDate);

        $testDql = "SELECT o FROM Gyman\Bundle\ScheduleBundle\Entity\Occurrence o WHERE o.startDate BETWEEN :start AND :end ORDER BY o.startDate ASC";

        $this->assertEquals($testDql, $query->getDQL());
        $this->assertEquals(2, $query->getParameters()->count());
        $this->assertParameterEqual('start', $startDate, $query->getParameters()->get(0));
        $this->assertParameterEqual('end', $endDate, $query->getParameters()->get(1));
    }

    public function testGetDeleteFollowingQueryBuilder()
    {
        $startDate = new \DateTime();
        $event = new Event();
        $occurrence = $this->getOccurrenceObject($startDate, $event);

        $query = $this->container->get('occurrence_repository')->getDeleteFollowingQueryBuilder($occurrence);

        $testDql = "DELETE Gyman\Bundle\ScheduleBundle\Entity\Occurrence o WHERE o.startDate >= :date AND o.event = :event";

        $this->assertEquals($testDql, $query->getDQL());
        $this->assertEquals(2, $query->getParameters()->count());
        $this->assertParameterEqual('date', $startDate, $query->getParameters()->get(0));
        $this->assertParameterEqual('event', $event, $query->getParameters()->get(1));
    }

    private function getOccurrenceObject(\DateTime $startDate, Event $event)
    {
        $occurrence = new Serial();
        $occurrence->setStartDate($startDate);
        $occurrence->setEvent($event);

        return $occurrence;
    }
}
