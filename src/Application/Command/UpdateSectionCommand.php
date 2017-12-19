<?php

namespace Gyman\Application\Command;


use Gyman\Domain\Section\SectionId;
use Ramsey\Uuid\UuidInterface;

class UpdateSectionCommand
{
    /** @var UuidInterface */
    protected $sectionId;

    /** @var UuidInterface|null */
    protected $instructorId;

    /** @var string */
    protected $title;

    /**
     * UpdateSectionCommand constructor.
     * @param SectionId $sectionId
     * @param null|UuidInterface $instructorId
     * @param string $title
     */
    public function __construct(UuidInterface $sectionId, ?UuidInterface $instructorId, string $title)
    {
        $this->sectionId = $sectionId;
        $this->instructorId = $instructorId;
        $this->title = $title;
    }

    public function sectionId(): UuidInterface
    {
        return $this->sectionId;
    }

    public function instructorId(): ?UuidInterface
    {
        return $this->instructorId;
    }

    public function title(): string
    {
        return $this->title;
    }
}