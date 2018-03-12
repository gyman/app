<?php
namespace Gyman\Domain;

use DateTime;
use Dende\Calendar\Domain\Calendar as BaseCalendar;
use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Calendar extends BaseCalendar
{
    /** @var Section */
    protected $section;

    public function __construct(?UuidInterface $id = null, string $title = '', $events = null, ?Section $section)
    {
        $this->id = $id ?: Uuid::uuid4();
        $this->title      = $title;
        $this->events     = $events ?: new ArrayCollection();

        if($section !== null) {
            $this->section = $section;
            $this->section->setCalendar($this);
        }

        $this->createdAt = new DateTime();
    }

    public function section() : ?Section
    {
        return $this->section;
    }

    public function updateTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function id() : UuidInterface
    {
        return $this->id;
    }
}
