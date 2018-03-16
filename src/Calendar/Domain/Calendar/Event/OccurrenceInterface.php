<?php
namespace Gyman\Calendar\Domain\Calendar\Event;

use DateTime;
use Gyman\Calendar\Domain\Calendar\Event;
use Gyman\Calendar\Domain\Calendar\Event\Occurrence\OccurrenceData;
use Gyman\Calendar\Domain\IdInterface;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface OccurrenceInterface.
 *
 * @property DateTime $startDate
 * @property DateTime $endDate
 * @property DurationInterface $duration
 * @property bool $modified
 * @property Event $event
 * @property string $id
 */
interface OccurrenceInterface
{
    public function resize(DurationInterface $duration);

    public function move(DateTime $startDate);

    public function isOngoing() : bool;

    public function isPast() : bool;

    public function startDate() : DateTime;

    public function duration() : DurationInterface;

    public function endDate() : DateTime;

    public function id() : UuidInterface;

    public function event() : Event;

    public function isModified() : bool;

    public function synchronizeWithEvent();

    public function update(OccurrenceData $data);
}
