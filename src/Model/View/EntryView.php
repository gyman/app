<?php

namespace Gyman\Model\View;

use DateTime;
use Gyman\Domain\Entry\Price;
use Gyman\Domain\Entry\Type;
use Ramsey\Uuid\UuidInterface;

class EntryView
{
    /** @var UuidInterface */
    protected $id;

    /** @var DateTime */
    protected $startDate;

    /** @var DateTime */
    protected $endDate;

    /** @var EventView */
    protected $event;

    /** @var SectionView */
    protected $section;

    /** @var Type */
    protected $type;

    /** @var Price|null */
    protected $price;

    /**
     * EntryView constructor.
     * @param UuidInterface $id
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @param EventView $event
     * @param SectionView $section
     * @param Type $type
     * @param Price|null $price
     */
    public function __construct(UuidInterface $id, DateTime $startDate, DateTime $endDate, EventView $event, SectionView $section, Type $type, ?Price $price)
    {
        $this->id = $id;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->event = $event;
        $this->section = $section;
        $this->type = $type;
        $this->price = $price;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function startDate(): DateTime
    {
        return $this->startDate;
    }

    public function endDate(): DateTime
    {
        return $this->endDate;
    }

    public function event(): EventView
    {
        return $this->event;
    }

    public function section(): SectionView
    {
        return $this->section;
    }

    public function type(): Type
    {
        return $this->type;
    }

    public function price(): ?Price
    {
        return $this->price;
    }

    public function toArray() : array
    {
        return [
            'title'           => $this->event->title(),
            'start'           => $this->startDate->format('Y-m-d H:i:s'),
            'end'             => $this->endDate->format('Y-m-d H:i:s'),
            'backgroundColor' => '#ffdddd',
            'textColor'       => 'black',
            'editable'        => false
        ];
}
}