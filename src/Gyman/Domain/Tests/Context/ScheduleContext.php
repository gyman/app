<?php
namespace Gyman\Domain\Tests\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Doctrine\Common\Collections\Criteria;
use Exception;
use Gyman\Domain\Command\CreateEventCommand;
use Gyman\Domain\Factory\EventFactory;
use Gyman\Domain\Handler\CreateEventHandler;
use Gyman\Domain\Model\Calendar;
use Doctrine\Common\Collections\Expr\Expression;
use Gyman\Domain\Repository\InMemoryEventRepository;
use Gyman\Domain\Service\GetOccurenceCollectionFromEventCommand;

/**
 * Class ScheduleContext
 * @package Gyman\Domain\Tests\Context
 */
class ScheduleContext implements Context
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
     * @BeforeScenario
     */
    public function prepareUseCases()
    {
        $this->calendar = new Calendar;
        $this->eventRepository = new InMemoryEventRepository();
        $this->createEventHandler = new CreateEventHandler($this->calendar, $this->eventRepository, new GetOccurenceCollectionFromEventCommand());
    }

    /**
     * @Given /^I have calendar created$/
     */
    public function iHaveCalendarCreated()
    {
        ;
    }

    /**
     * @When /^I add new calendar event with data$/
     */
    public function iAddNewCalendarEventWithData(TableNode $table)
    {
        foreach($table as $row) {
            $command = new CreateEventCommand();
            $command->type = $row["type"];
            $command->startDate = $row["startDate"];
            $command->endDate = $row["endDate"];
            $command->duration = $row["duration"];
            $command->title = $row["title"];

            $event = EventFactory::createFromCommand($command);
            $this->calendar->insertEvent($event);
        }

    }

    /**
     * @Then /^calendar has (\d+) event$/
     */
    public function calendarHasEvent($count)
    {
        if($this->calendar->events()->count() != $count) {
            throw new Exception(
                sprintf("Expected that calendar has %d events, actually has %d event", $count, $this->calendar->events()->count())
            );
        }
    }

    /**
     * @Given /^event \'([^\']*)\' has (\d+) occurence with data$/
     */
    public function eventHasOccurenceWithData($eventId, $count, TableNode $table)
    {
        $criteria = Criteria::create()->where(Criteria::expr()->eq('id', $eventId));
        $events = $this->calendar->events()->matching($criteria);

        if($events->count() != $count) {
            throw new Exception(
                sprintf("Event not found")
            );
        }
    }
}
