<?php
namespace Dende\Calendar\UserInterface\Symfony\CalendarBundle\Tests\Integration;

use DateTime;
use Dende\Calendar\Application\Factory\OccurrenceFactory;
use Dende\Calendar\Domain\Calendar;
use Dende\Calendar\Domain\Calendar\CalendarId;
use Dende\Calendar\Domain\Calendar\Event;
use Dende\Calendar\Domain\Calendar\Event\Duration;
use Dende\Calendar\Domain\Calendar\Event\EventId;
use Dende\Calendar\Domain\Calendar\Event\EventType;
use Dende\Calendar\Domain\Calendar\Event\Repetitions;
use Dende\Calendar\Infrastructure\Persistence\InMemory\InMemoryEventRepository;
use Dende\Calendar\Infrastructure\Persistence\InMemory\InMemoryOccurrenceRepository;
use Dende\Calendar\Infrastructure\Persistence\InMemory\Specification\InMemoryEventByWeekSpecification;
use Dende\Calendar\Infrastructure\Persistence\InMemory\Specification\InMemoryOccurrenceByWeekSpecification;
use Dende\Calendar\Tests\AssertDatesEqualTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class EventTest
 * @package Gyman\Domain\Tests\Unit\Model
 */
class CalendarTest extends \PHPUnit_Framework_TestCase
{
    use AssertDatesEqualTrait;

    public function testGetEventsByDate()
    {
        $calendar = new Calendar(new CalendarId(0));

        $event1 = new Event(
            new EventId(1),
            $calendar,
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('2015-09-01 12:00:00'),
            new DateTime('2015-09-30 13:30:00'),
            'first event',
            new Repetitions([
                Repetitions::MONDAY,
                Repetitions::WEDNESDAY,
                Repetitions::FRIDAY,
            ]),
            new Duration(90),
            new ArrayCollection()
        );

        $event2 = new Event(
            new EventId(2),
            $calendar,
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('2015-09-01 12:15:00'),
            new DateTime('2015-09-30 13:00:00'),
            'second event',
            new Repetitions([
                Repetitions::WEDNESDAY,
            ]),
            new Duration(90),
            new ArrayCollection()
        );

        $event3 = new Event(
            new EventId(3),
            $calendar,
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('2015-09-01 12:15:00'),
            new DateTime('2015-09-30 13:00:00'),
            'third event',
            new Repetitions([
                Repetitions::MONDAY,
            ]),
            new Duration(90),
            new ArrayCollection()
        );

        $event4 = new Event(
            new EventId(4),
            $calendar,
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('2015-09-01 12:15:00'),
            new DateTime('2015-09-30 13:00:00'),
            'fourth event',
            new Repetitions([
                Repetitions::MONDAY,
                Repetitions::WEDNESDAY,
                Repetitions::FRIDAY,            ]),
            new Duration(90),
            new ArrayCollection()
        );

        $eventRepository = new InMemoryEventRepository();
        $eventRepository->insert($event1);
        $eventRepository->insert($event2);
        $eventRepository->insert($event3);
        $eventRepository->insert($event4);

        $eventCollection = $eventRepository->query(
            new InMemoryEventByWeekSpecification(2015, 38)
        );

        $this->assertCount(4, $eventCollection);

        $occurrenceRepository = new InMemoryOccurrenceRepository();

        foreach($eventCollection as $event) {
            $occurrencesCollection = OccurrenceFactory::generateCollectionFromEvent($event);
            foreach($occurrencesCollection as $occurrence) {
                $occurrenceRepository->insert($occurrence);
            }
        }

        $occurenceCollection = $occurrenceRepository->query(
            new InMemoryOccurrenceByWeekSpecification(2015, 38)
        );

        $this->assertCount(8, $occurenceCollection);

        $this->assertDatesEqual($occurenceCollection[0]->startDate(), '2015-09-02 12:00:00');
        $this->assertDatesEqual($occurenceCollection[1]->startDate(), '2015-09-04 12:00:00');
        $this->assertDatesEqual($occurenceCollection[2]->startDate(), '2015-09-07 12:00:00');
        $this->assertDatesEqual($occurenceCollection[3]->startDate(), '2015-09-09 12:00:00');
        $this->assertDatesEqual($occurenceCollection[4]->startDate(), '2015-09-11 12:00:00');
        $this->assertDatesEqual($occurenceCollection[5]->startDate(), '2015-09-14 12:00:00');
        $this->assertDatesEqual($occurenceCollection[6]->startDate(), '2015-09-16 12:00:00');
        $this->assertDatesEqual($occurenceCollection[7]->startDate(), '2015-09-18 12:00:00');
        $this->assertDatesEqual($occurenceCollection[8]->startDate(), '2015-09-21 12:00:00');
        $this->assertDatesEqual($occurenceCollection[9]->startDate(), '2015-09-23 12:00:00');
        $this->assertDatesEqual($occurenceCollection[10]->startDate(), '2015-09-25 12:00:00');
        $this->assertDatesEqual($occurenceCollection[11]->startDate(), '2015-09-28 12:00:00');
        $this->assertDatesEqual($occurenceCollection[12]->startDate(), '2015-09-30 12:00:00');
    }
}
