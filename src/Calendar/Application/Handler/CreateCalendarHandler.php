<?php
namespace Gyman\Calendar\Application\Handler;

use Gyman\Calendar\Application\Command\CreateCalendarCommand;
use Gyman\Calendar\Application\Event\PostCreateCalendar;
use Gyman\Calendar\Application\Events;
use Gyman\Calendar\Application\Factory\CalendarFactoryInterface;
use Gyman\Calendar\Application\Repository\CalendarRepositoryInterface;
use Gyman\Calendar\Domain\Calendar;
use Gyman\Calendar\Domain\Calendar\CalendarId;
use Exception;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CreateCalendarHandler
{

    /**
     * @var CalendarRepositoryInterface
     */
    private $calendarRepository;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function __construct(CalendarRepositoryInterface $calendarRepository, EventDispatcherInterface $eventDispatcher)
    {
        $this->calendarRepository = $calendarRepository;
        $this->eventDispatcher    = $eventDispatcher;
    }

    public function handle(CreateCalendarCommand $command)
    {
        $calendar = Calendar::create($command->title());

        $this->calendarRepository->insert($calendar);

        $this->eventDispatcher->dispatch(
            Events::POST_CREATE_CALENDAR,
            new PostCreateCalendar($calendar)
        );
    }
}
