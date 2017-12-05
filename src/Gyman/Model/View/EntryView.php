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
     * @param EventView $event
     * @param SectionView $section
     * @param Type $type
     * @param Price $price
     */
    public function __construct(UuidInterface $id, DateTime $startDate, EventView $event, SectionView $section, Type $type, Price $price = null)
    {
        $this->id = $id;
        $this->startDate = $startDate;
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
}