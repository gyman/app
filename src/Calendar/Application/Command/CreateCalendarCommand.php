<?php
namespace Gyman\Calendar\Application\Command;

use Gyman\Calendar\Domain\Calendar\CalendarId;
use Gyman\Calendar\Domain\IdInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class CreateCalendarCommand
{
    /** @var UuidInterface */
    protected $id;

    /** @var string */
    protected $title;

    public function __construct(?UuidInterface $id = null, string $title = '')
    {
        $this->id = $id ?? Uuid::uuid4();
        $this->title      = $title;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }
}
