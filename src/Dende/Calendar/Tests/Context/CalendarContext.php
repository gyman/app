<?php
namespace Dende\Calendar\Tests\Context;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use DateTime;
use Dende\Calendar\Application\Factory\EventFactory;
use Dende\Calendar\Application\Handler\CreateEventHandler;
use Dende\Calendar\Command\CreateEventCommand;
use Dende\Calendar\Domain\Calendar;
use Doctrine\Common\Collections\Criteria;
use Exception;
use Gyman\Domain\Model\Section;
use Gyman\Domain\Repository\InMemoryEventRepository;
use Gyman\Domain\Repository\InMemoryOccurrenceRepository;

/**
 * Class ScheduleContext
 * @package Gyman\Domain\Tests\Context
 */
class CalendarContext implements Context
{
    /**
     * @var Calendar
     */
    private $calendar;

    /**
     * @var CreateEventHandler
     */
    private $createEventHandler;

    /**
     * @var InMemoryEventRepository
     */
    private $eventRepository;

    /**
     * @var InMemoryOccurrenceRepository
     */
    private $occurrenceRepository;

    /**
     * @BeforeScenario
     */
    public function prepareUseCases()
    {
        $this->calendar = new Calendar(new Section('test'));
        $this->eventRepository = new InMemoryEventRepository();
        $this->occurrenceRepository = new InMemoryOccurrenceRepository();
        $this->createEventHandler = new CreateEventHandler(
            $this->calendar,
            $this->eventRepository,
            $this->occurrenceRepository
        );
    }

    /**
     * @Given /^I have calendar created$/
     */
    public function iHaveCalendarCreated()
    {;
    }

    /**
     * @When /^I add new calendar event with data$/
     */
    public function iAddNewCalendarEventWithData(TableNode $table)
    {
        foreach ($table as $row) {
            $command = new CreateEventCommand();
            $command->type = $row['type'];
            $command->startDate = new DateTime($row['startDate']);
            $command->duration = $row['duration'];
            $command->title = $row['title'];

            $event = EventFactory::createFromCommand($command);
            $this->calendar->insertEvent($event);
        }
    }

    /**
     * @Then /^calendar has (\d+) event$/
     */
    public function calendarHasEvent($count)
    {
        if ($this->calendar->events()->count() != $count) {
            throw new Exception(
                sprintf('Expected that calendar has %d events, actually has %d event', $count, $this->calendar->events()->count())
            );
        }
    }

    /**
     * @Given /^event \'([^\']*)\' has (\d+) occurrence with data$/
     */
    public function eventHasOccurrenceWithData($eventId, $count, TableNode $table)
    {
        $criteria = Criteria::create()->where(Criteria::expr()->eq('id', $eventId));
        $events = $this->calendar->events()->matching($criteria);

        if ($events->count() != $count) {
            throw new Exception(
                sprintf('Event not found')
            );
        }
    }

    /**
     * @Given /^current event has title \'([^\']*)\'$/
     */
    public function currentEventHasTitle($title)
    {
        $event = $this->calendar->getCurrentEvent();

        if ($event->title() === $title) {
            return;
        }

        throw new \Exception(sprintf("Current event with title '%s' not found", $title));
    }

    /**
     * @Given /^calendar returns (\d+) event for current week$/
     */
    public function calendarReturnsEventForCurrentWeek($arg1)
    {
        if (count($this->calendar->getEventsForCurrentWeek()) === $arg1) {
            return;
        }

        throw new \Exception(sprintf(
            'Expected %d events for current weekd, actually got %d events',
            $arg1,
            count($this->calendar->getEventsForCurrentWeek())
        ));
    }
}
