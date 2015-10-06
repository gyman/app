<?php
namespace Dende\Calendar\Domain\Calendar;

use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Dende\Calendar\Application\Factory\OccurrenceFactory;
use Dende\Calendar\Domain\Calendar;
use Dende\Calendar\Domain\Calendar\Event\Duration;
use Dende\Calendar\Domain\Calendar\Event\EventId;
use Dende\Calendar\Domain\Calendar\Event\EventType;
use Dende\Calendar\Domain\Calendar\Event\Occurrence;
use Dende\Calendar\Domain\Calendar\Event\Repetitions;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\AppBundle\Globals;

/**
 * Class Event
 * @package Gyman\Domain\Model
 */
class Event
{
    /**
     * @var EventId
     */
    private $id;

    /**
     * @var Calendar
     */
    private $calendar;

    /**
     * @var EventType
     */
    private $type;

    /**
     * @var DateTime
     */
    private $startDate;

    /**
     * @var DateTime
     */
    private $endDate;

    /**
     * @var string
     */
    private $title;

    /**
     * @var Repetitions
     */
    private $repetitions;

    /**
     * @var Duration
     */
    private $duration;

    /** @var ArrayCollection|Occurrence[] */
    private $occurrences;

    /**
     * Event constructor.
     * @param EventId $id
     * @param Calendar $calendar
     * @param EventType $type
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @param string $title
     * @param Repetitions $repetitions
     * @param Duration $duration
     * @param ArrayCollection|Occurrence[] $occurrences
     * @throws \Exception
     */
    public function __construct(EventId $id, Calendar $calendar, EventType $type, DateTime $startDate, DateTime $endDate, $title, Repetitions $repetitions, Duration $duration, $occurrences)
    {
        if (Carbon::instance($startDate)->gt(Carbon::instance($endDate))) {
            throw new \Exception(sprintf(
                "End date '%s' cannot be before start date '%s'",
                $endDate->format(Globals::getDefaultDateTimeFormat()),
                $startDate->format(Globals::getDefaultDateTimeFormat())
            ));
        }

        $calendar->insertEvent($this);

        $this->id = $id;
        $this->calendar = $calendar;
        $this->type = $type;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->title = $title;
        $this->repetitions = $repetitions;
        $this->duration = $duration;
        $this->occurrences = $occurrences;
    }

    /**
     * @return ArrayCollection|Occurrence[]
     */
    public function occurrences()
    {
        return $this->occurrences;
    }

    /**
     * @return bool
     */
//    public function isOngoing()
//    {
//        return !is_null($this->getCurrentOccurrence());
//    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return EventType
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return Repetitions
     */
    public function repetitions()
    {
        return $this->repetitions;
    }

    /**
     * @return mixed
     */
    public function duration()
    {
        return $this->duration;
    }

    /**
     * @return Calendar
     */
    public function calendar()
    {
        return $this->calendar;
    }

    /**
     * @return DateTime
     */
    public function startDate()
    {
        return $this->startDate;
    }

    /**
     * @return DateTime
     */
    public function endDate()
    {
        return $this->endDate;
    }

    /**
     * @return ArrayCollection|DateTime[]
     */
    public function calculateOccurrencesDates()
    {
        $occurrences = new ArrayCollection();

        if ($this->type->isType(EventType::TYPE_SINGLE)) {
            $occurrences->add($this->startDate);
        } elseif ($this->type->isType(EventType::TYPE_WEEKLY)) {

            $interval = new DateInterval('P1D');

            /** @var DateTime[] $period */
            $period = new DatePeriod($this->startDate, $interval, $this->endDate);
            foreach ($period as $date) {
                if (in_array($date->format('N'), $this->repetitions->weekly())) {
                    $occurrences->add($date);
                }
            }
        }

        return $occurrences;
    }

//    public function resetAllOccurrences()
//    {
//        $this->occurrences = $this->generateOccurencesCollection();
//    }

    /**
     * @return ArrayCollection|Occurrence[]
     */
//    public function generateOccurencesCollection()
//    {
//        $occurences = new ArrayCollection();
//
//        foreach ($this->calculateOccurrencesDates() as $date) {
//            $occurences->add(OccurrenceFactory::createFromArray([
//                'startDate' => $date,
//                'duration'  => $this->duration,
//                'event'     => $this,
//            ]));
//        }
//
//        return $occurences;
//    }

//    public function getCurrentOccurrence()
//    {
//        return $this->getOccurenceByDate(new DateTime('now'));
//    }

    /**
     * @param Repetitions $repetitions
     */
//    public function updateRepetitions(Repetitions $repetitions)
//    {
//        $this->repetitions = $repetitions;
//        $this->resetAllOccurrences();
//    }

    /**
     * @param Duration $duration
     */
//    public function resize(Duration $duration)
//    {
//        $this->duration = $duration;
//        $this->resetAllOccurrences();
//    }

    /**
     * @param DateTime $startDate
     */
//    public function move(DateTime $startDate)
//    {
//        $this->startDate = $startDate;
//        $this->resetAllOccurrences();
//    }

    public function assignCalendar(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    /**
     * @return EventId
     */
    public function id()
    {
        return $this->id;
    }
}
