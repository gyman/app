<?php
namespace Gyman\Calendar\Application\Handler;

use Gyman\Calendar\Application\Command\UpdateOccurrenceCommand;
use Gyman\Calendar\Domain\Calendar;
use Gyman\Calendar\Domain\Repository\CalendarRepositoryInterface;

/**
 * Class RemoveEventHandler.
 */
final class RemoveCalendarHandler
{
    /**
     * @var RemoveEventHandler
     */
    private $eventRemoveHandler;

    /**
     * @var CalendarRepositoryInterface
     */
    private $calendarRepository;

    /**
     * @param UpdateOccurrenceCommand $command
     */
    public function remove(Calendar $calendar)
    {
        $this->eventRemoveHandler->removeCollection($calendar->events());
        $this->calendarRepository->remove($calendar);
    }
}
