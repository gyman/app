<?php
namespace Dende\Calendar\UserInterface\Symfony\CalendarBundle\Tests\Unit\Model;

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

    }
}
