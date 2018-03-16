<?php
namespace Gyman\Calendar\Domain;

use DateTime;
use Gyman\Calendar\Application\Factory\EventFactory;
use Gyman\Calendar\Application\Factory\EventFactoryInterface;
use Gyman\Calendar\Domain\Calendar\Event;
use Gyman\Calendar\Domain\Calendar\Event\EventType;
use Gyman\Calendar\Domain\Calendar\Event\Repetitions;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Calendar.
 */
class Calendar
{
    use SoftDeleteable;

    /**
     * @var UuidInterface
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var ArrayCollection|Event[]
     */
    protected $events;

    public function __construct(UuidInterface $id = null, string $title = '', Collection $events = null)
    {
        $this->id = $id ?? Uuid::uuid4();
        $this->title      = $title;
        $this->events     = $events ?: new ArrayCollection();
    }

    public static function create(string $title = '') : Calendar
    {
        return new static(null, $title);
    }

    public function addEvent(Event $event) : void
    {
        $this->events->add($event);
    }

    public function events() : Collection
    {
        return $this->events;
    }

    public function id() : UuidInterface
    {
        return $this->id;
    }

    public function title() : string
    {
        return $this->title;
    }

    public function getEventById(UuidInterface $eventId) : Event
    {
        $result = $this->events()->filter(function (Event $event) use ($eventId) {
            return $event->id()->equals($eventId);
        });

        return $result->first();
    }
}
