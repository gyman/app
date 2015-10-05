<?php
namespace Dende\Calendar\Tests\Unit\Model;

use DateTime;
use Dende\Calendar\Domain\Calendar;
use Dende\Calendar\Domain\Calendar\Event;
use Dende\Calendar\Domain\Calendar\Event\Duration;
use Dende\Calendar\Domain\Calendar\Event\EventType;
use Dende\Calendar\Domain\Calendar\Event\Repetitions;
use Dende\Calendar\Tests\AssertDatesEqualTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Model\Section;

/**
 * Class EventTest
 * @package Gyman\Domain\Tests\Unit\Model
 */
class EventTest extends \PHPUnit_Framework_TestCase
{
    use AssertDatesEqualTrait;

    public function testCalculateOccurrencesDatesWeekly()
    {
        $event = new Event(
            new Calendar(),
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('2015-09-01 12:00:00'),
            new DateTime('2015-09-30 13:30:00'),
            'some title',
            new Repetitions([
                Repetitions::MONDAY,
                Repetitions::WEDNESDAY,
                Repetitions::FRIDAY,
            ]),
            new Duration(90),
            new ArrayCollection()
        );

        $collection = $event->calculateOccurrencesDates();
        $this->assertCount(13, $collection);

        $this->assertDatesEqual($collection[0], '2015-09-02 12:00:00');
        $this->assertDatesEqual($collection[1], '2015-09-04 12:00:00');
        $this->assertDatesEqual($collection[2], '2015-09-07 12:00:00');
        $this->assertDatesEqual($collection[3], '2015-09-09 12:00:00');
        $this->assertDatesEqual($collection[4], '2015-09-11 12:00:00');
        $this->assertDatesEqual($collection[5], '2015-09-14 12:00:00');
        $this->assertDatesEqual($collection[6], '2015-09-16 12:00:00');
        $this->assertDatesEqual($collection[7], '2015-09-18 12:00:00');
        $this->assertDatesEqual($collection[8], '2015-09-21 12:00:00');
        $this->assertDatesEqual($collection[9], '2015-09-23 12:00:00');
        $this->assertDatesEqual($collection[10], '2015-09-25 12:00:00');
        $this->assertDatesEqual($collection[11], '2015-09-28 12:00:00');
        $this->assertDatesEqual($collection[12], '2015-09-30 12:00:00');
    }

    public function testCalculateOccurrencesDatesSingle()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_SINGLE),
            new DateTime('2015-09-01 12:00:00'),
            new DateTime('2015-09-30 13:30:00'),
            'some title',
            new Repetitions([]),
            new Duration(90),
            new ArrayCollection()
        );

        $collection = $event->calculateOccurrencesDates();
        $this->assertCount(1, $collection);

        $this->assertDatesEqual($collection[0], '2015-09-01 12:00:00');
    }

    public function testGenerateOccurencesCollection()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('2015-09-01 12:00:00'),
            new DateTime('2015-09-30 13:30:00'),
            'some title',
            new Repetitions([
                Repetitions::MONDAY,
                Repetitions::WEDNESDAY,
                Repetitions::FRIDAY,
            ]),
            new Duration(90),
            new ArrayCollection()
        );

        $collection = $event->generateOccurencesCollection();

        $this->assertCount(13, $collection);

        $this->assertDatesEqual($collection[0]->startDate(), '2015-09-02 12:00:00');
        $this->assertDatesEqual($collection[1]->startDate(), '2015-09-04 12:00:00');
        $this->assertDatesEqual($collection[2]->startDate(), '2015-09-07 12:00:00');
        $this->assertDatesEqual($collection[3]->startDate(), '2015-09-09 12:00:00');
        $this->assertDatesEqual($collection[4]->startDate(), '2015-09-11 12:00:00');
        $this->assertDatesEqual($collection[5]->startDate(), '2015-09-14 12:00:00');
        $this->assertDatesEqual($collection[6]->startDate(), '2015-09-16 12:00:00');
        $this->assertDatesEqual($collection[7]->startDate(), '2015-09-18 12:00:00');
        $this->assertDatesEqual($collection[8]->startDate(), '2015-09-21 12:00:00');
        $this->assertDatesEqual($collection[9]->startDate(), '2015-09-23 12:00:00');
        $this->assertDatesEqual($collection[10]->startDate(), '2015-09-25 12:00:00');
        $this->assertDatesEqual($collection[11]->startDate(), '2015-09-28 12:00:00');
        $this->assertDatesEqual($collection[12]->startDate(), '2015-09-30 12:00:00');
    }

    public function testProduceEveryDayOccurrence()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('2015-09-01 12:00:00'),
            new DateTime('2015-09-30 13:30:00'),
            'some title',
            new Repetitions([
                Repetitions::MONDAY,
                Repetitions::TUESDAY,
                Repetitions::WEDNESDAY,
                Repetitions::THURSDAY,
                Repetitions::FRIDAY,
                Repetitions::SATURDAY,
                Repetitions::SUNDAY,
            ]),
            new Duration(90),
            new ArrayCollection()
        );

        $collection = $event->generateOccurencesCollection();

        $this->assertCount(30, $collection);

        $this->assertDatesEqual($collection[0]->startDate(), '2015-09-01 12:00:00');
        $this->assertDatesEqual($collection[9]->startDate(), '2015-09-10 12:00:00');
        $this->assertDatesEqual($collection[29]->startDate(), '2015-09-30 12:00:00');
    }

    public function testProduceNoOccurrenceWeekly()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('2015-09-01 12:00:00'),
            new DateTime('2015-09-01 12:00:00'),
            'some title',
            new Repetitions([
                Repetitions::TUESDAY,
            ]),
            new Duration(90),
            new ArrayCollection()
        );

        $this->assertCount(0, $event->generateOccurencesCollection());

        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('2015-09-01 12:00:00'),
            new DateTime('2015-09-01 13:30:00'),
            'some title',
            new Repetitions([]),
            new Duration(90),
            new ArrayCollection()
        );

        $this->assertCount(0, $event->generateOccurencesCollection());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage End date '2015.08.01 12:00:00' cannot be before start date '2015.09.01 12:00:00'
     */
    public function testConstructorExceptions()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('2015-09-01 12:00:00'),
            new DateTime('2015-08-01 12:00:00'),
            'some title',
            new Repetitions([
                Repetitions::TUESDAY,
            ]),
            new Duration(90),
            new ArrayCollection()
        );
    }

    public function testGetOccurenceByDateWeekly()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('2015-09-01 12:00:00'),
            new DateTime('2015-09-07 13:30:00'),
            'some title',
            new Repetitions([
                Repetitions::MONDAY,
                Repetitions::TUESDAY,
                Repetitions::WEDNESDAY,
                Repetitions::THURSDAY,
                Repetitions::FRIDAY,
                Repetitions::SATURDAY,
                Repetitions::SUNDAY,
            ]),
            new Duration(90),
            new ArrayCollection()
        );

        $event->resetAllOccurrences();

        $totalOccurences = $event->occurrences();
        $occurence = $event->getOccurenceByDate(new \DateTime('2015-09-01 12:30:00'));

        $this->assertNotNull($occurence);
        $this->assertCount(7, $totalOccurences);
        $this->assertInstanceOf('Dende\Calendar\Model\Occurrence', $occurence);
    }

    public function testGetOccurenceByDateSingle()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_SINGLE),
            new DateTime('2015-09-01 12:00:00'),
            new DateTime('2015-09-07 13:30:00'),
            'some title',
            new Repetitions([]),
            new Duration(90),
            new ArrayCollection()
        );

        $event->resetAllOccurrences();

        $totalOccurences = $event->occurrences();
        $occurence = $event->getOccurenceByDate(new \DateTime('2015-09-01 12:30:00'));

        $this->assertNotNull($occurence);
        $this->assertCount(1, $totalOccurences);
        $this->assertInstanceOf('Dende\Calendar\Model\Occurrence', $occurence);
        $this->assertDatesEqual($occurence->startDate(), '2015-09-01 12:00:00');
        $this->assertDatesEqual($occurence->endDate(), '2015-09-01 13:30:00');
    }

    public function testGetOccurenceByDateReturnsNothingWeekly()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('2015-09-01 12:00:00'),
            new DateTime('2015-09-30 13:30:00'),
            'some title',
            new Repetitions([
                Repetitions::MONDAY,
                Repetitions::WEDNESDAY,
                Repetitions::FRIDAY,
            ]),
            new Duration(90),
            new ArrayCollection()
        );

        $event->resetAllOccurrences();

        $totalOccurences = $event->occurrences();
        $occurence = $event->getOccurenceByDate(new \DateTime('2015-09-01 12:30:00'));

        $this->assertNull($occurence);
        $this->assertCount(13, $totalOccurences);
    }

    public function testGetOccurenceByDateReturnsNothingSingle()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_SINGLE),
            new DateTime('now'),
            new DateTime('tomorrow'),
            'some title',
            new Repetitions([]),
            new Duration(90),
            new ArrayCollection()
        );

        $event->resetAllOccurrences();

        $totalOccurences = $event->occurrences();
        $occurence = $event->getOccurenceByDate(new \DateTime('yesterday'));

        $this->assertNull($occurence);
        $this->assertCount(1, $totalOccurences);
    }

    public function testGetCurrentOccurenceSingle()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_SINGLE),
            new DateTime('now'),
            new DateTime('tomorrow'),
            'some title',
            new Repetitions([]),
            new Duration(24 * 60),
            new ArrayCollection()
        );

        $event->resetAllOccurrences();

        $totalOccurences = $event->occurrences();
        $occurence = $event->getCurrentOccurrence();

        $this->assertNotNull($occurence);
        $this->assertCount(1, $totalOccurences);
        $this->assertDatesEqual($occurence->startDate(), 'now');
        $this->assertDatesEqual($occurence->endDate(), '+24 hours');
    }

    public function testGetCurrentOccurenceWeekly()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('-1 day 00:00:00'),
            new DateTime('+1 day 23:59:59'),
            'some title',
            new Repetitions([
                Repetitions::MONDAY,
                Repetitions::TUESDAY,
                Repetitions::WEDNESDAY,
                Repetitions::THURSDAY,
                Repetitions::FRIDAY,
                Repetitions::SATURDAY,
                Repetitions::SUNDAY,
            ]),
            new Duration(24 * 60),
            new ArrayCollection()
        );

        $event->resetAllOccurrences();

        $totalOccurences = $event->occurrences();
        $occurence = $event->getCurrentOccurrence();

        $this->assertNotNull($occurence);
        $this->assertCount(3, $totalOccurences);
    }

    public function testIsOngoingSingle()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_SINGLE),
            new DateTime('now'),
            new DateTime('+60 minutes'),
            'some title',
            new Repetitions([]),
            new Duration(60),
            new ArrayCollection()
        );

        $event->resetAllOccurrences();

        $totalOccurences = $event->occurrences();

        $this->assertTrue($event->isOngoing());
        $this->assertCount(1, $totalOccurences);
    }

    public function testIsOngoingWeekly()
    {
        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('now'),
            new DateTime('+10 minutes'),
            'some title',
            new Repetitions([
                Repetitions::MONDAY,
                Repetitions::TUESDAY,
                Repetitions::WEDNESDAY,
                Repetitions::THURSDAY,
                Repetitions::FRIDAY,
                Repetitions::SATURDAY,
                Repetitions::SUNDAY,
            ]),
            new Duration(10),
            new ArrayCollection()
        );

        $event->resetAllOccurrences();

        $totalOccurences = $event->occurrences();

        $this->assertTrue($event->isOngoing());
        $this->assertCount(1, $totalOccurences);

        $event = new Event(
            new Calendar(new Section(null)),
            new EventType(EventType::TYPE_WEEKLY),
            new DateTime('+10 minutes'),
            new DateTime('+20 minutes'),
            'some title',
            new Repetitions([
                Repetitions::MONDAY,
                Repetitions::TUESDAY,
                Repetitions::WEDNESDAY,
                Repetitions::THURSDAY,
                Repetitions::FRIDAY,
                Repetitions::SATURDAY,
                Repetitions::SUNDAY,
            ]),
            new Duration(10),
            new ArrayCollection()
        );

        $event->resetAllOccurrences();

        $totalOccurences = $event->occurrences();

        $this->assertFalse($event->isOngoing());
        $this->assertCount(1, $totalOccurences);
    }
}
