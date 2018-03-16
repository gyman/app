<?php
namespace Gyman\Calendar\Application\Service;

use DateTime;
use Gyman\Calendar\Application\Repository\OccurrenceRepositoryInterface;
use Gyman\Calendar\Domain\Calendar;
use Gyman\Calendar\Domain\Calendar\Event;
use Gyman\Calendar\Domain\Calendar\Event\Occurrence;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class FindCurrentEvent.
 */
final class FindCurrentEvent
{
    /**
     * @var OccurrenceRepositoryInterface
     */
    private $occurrenceRepository;

    /**
     * FindCurrentEvent constructor.
     *
     * @param OccurrenceRepositoryInterface $occurrenceRepository
     */
    public function __construct(OccurrenceRepositoryInterface $occurrenceRepository)
    {
        $this->occurrenceRepository = $occurrenceRepository;
    }

    /**
     * @param Calendar $calendar
     *
     * @return ArrayCollection|Event[]
     */
    public function getCurrentEvents(Calendar $calendar, DateTime $date = null) : ArrayCollection
    {
        $result = $this->occurrenceRepository->findByDateAndCalendar($date ?: new DateTime('now'), $calendar);

        return $result->map(function (Occurrence $occurrence) {
            return $occurrence->event();
        });
    }
}
