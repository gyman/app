<?php

namespace Gyman\Model\View;

use Ramsey\Uuid\UuidInterface;

class CalendarView
{
    /** @var UuidInterface */
    protected $id;

    /** @var string */
    protected $title;

    /**
     * CalendarView constructor.
     * @param UuidInterface $id
     * @param string $title
     */
    public function __construct(UuidInterface $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
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