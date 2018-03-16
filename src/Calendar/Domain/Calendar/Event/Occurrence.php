<?php
namespace Gyman\Calendar\Domain\Calendar\Event;

use Carbon\Carbon;
use DateTime;
use Gyman\Calendar\Domain\Calendar\Event;
use Gyman\Calendar\Domain\Calendar\Event\Occurrence\OccurrenceData;
use Gyman\Calendar\Domain\Calendar\Event\Occurrence\OccurrenceDuration;
use Gyman\Calendar\Domain\Calendar\Event\Occurrence\OccurrenceId;
use Gyman\Calendar\Domain\Calendar\EventInterface;
use Gyman\Calendar\Domain\IdInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Exception;

/**
 * Class Occurrence.
 */
class Occurrence implements OccurrenceInterface
{
    /**
     * @var UuidInterface
     */
    protected $id;

    /**
     * @var OccurrenceData
     */
    protected $occurrenceData;

    /**
     * @var bool
     */
    protected $modified = false;

    /**
     * @var Event
     */
    protected $event;

    public function __construct(UuidInterface $id = null, EventInterface $event, DateTime $startDate = null, ?OccurrenceDuration $duration = null)
    {
        $this->id = $id ?? Uuid::uuid4();
        $this->event        = $event;

        if (null === $startDate) {
            $this->occurrenceData = OccurrenceData::createFromEvent($event);
        } elseif (null === $duration) {
            $this->occurrenceData = new OccurrenceData($startDate, new OccurrenceDuration($event->duration()->minutes()));
        } else {
            $this->occurrenceData = new OccurrenceData($startDate, $duration);
        }
    }

    public static function create(UuidInterface $id = null, DateTime $startDate, Event $event) : self
    {
        return new static($id, $event, $startDate);
    }

    public function update(OccurrenceData $data)
    {
        if ($data->startDate()->format('Ymd') !== $this->occurrenceData->startDate()->format('Ymd')) {
            throw new Exception(sprintf(
                "You can't change a day of occurrence, only hour! (new: %s vs old: %s)",
                $data->startDate()->format('Y-m-d H:i:s'),
                $this->occurrenceData->startDate()->format('Y-m-d H:i:s')
            ));
        }

        $this->occurrenceData = $data;
    }

    /**
     * @param OccurrenceDuration $newDuration
     */
    public function resize(DurationInterface $newDuration)
    {
        $this->occurrenceData = $this->occurrenceData->updateDuration($newDuration);
    }

    /**
     * @param DateTime $startDate
     */
    public function move(DateTime $startDate)
    {
        if ($startDate->format('Ymd') !== $this->occurrenceData->startDate()->format('Ymd')) {
            throw new Exception("You can't change a day of occurrence, only hour!");
        }

        $this->occurrenceData = $this->occurrenceData->updateStartDate($startDate);
    }

    /**
     * @return bool
     */
    public function isOngoing() : bool
    {
        return Carbon::now()->between(Carbon::instance($this->startDate()), Carbon::instance($this->endDate()));
    }

    /**
     * @return bool
     */
    public function isPast() : bool
    {
        return Carbon::now()->greaterThan(Carbon::instance($this->endDate()));
    }

    /**
     * @return DateTime
     */
    public function startDate() : DateTime
    {
        return $this->occurrenceData->startDate();
    }

    /**
     * @return OccurrenceDuration
     */
    public function duration() : DurationInterface
    {
        return $this->occurrenceData->duration();
    }

    /**
     * @return DateTime
     */
    public function endDate() : DateTime
    {
        return $this->occurrenceData->endDate();
    }

    public function id() : UuidInterface
    {
        return $this->id;
    }

    protected function setAsModified()
    {
        $this->modified = true;
    }

    public function isModified() : bool
    {
        return $this->modified;
    }

    public function synchronizeWithEvent()
    {
        if ($this->event->isSingle()) {
            $this->move($this->event->startDate());
            $this->resize($this->event->duration());
        } elseif ($this->event->isWeekly()) {
            $newStartDate = $this->occurrenceData->startDate();
            $newStartDate->modify($this->event->startDate()->format('H:i:s'));
            $this->move($newStartDate);
        }

        $this->modified = false;
    }

    public function event() : Event
    {
        return $this->event;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function dumpDatesAsString() : string
    {
        return sprintf('[%s:%s]', $this->startDate()->format('d/m'), $this->duration()->minutes());
    }
}
