<?php

declare(strict_types=1);

namespace Gyman\Application\Command;

use Gyman\Domain\Calendar\Event\Occurrence\Note;
use Gyman\Domain\Calendar\Event\Occurrence\Subject;
use Ramsey\Uuid\UuidInterface;

class UpdateOccurrenceDetailsCommand
{
    /** @var UuidInterface */
    private $occurrenceId;

    /** @var UuidInterface|null */
    private $instructorId;

    /** @var Subject */
    private $subject;

    /** @var Note */
    private $note;

    public function __construct(UuidInterface $occurrenceId, ?UuidInterface $instructorId, Subject $subject, Note $note)
    {
        $this->occurrenceId = $occurrenceId;
        $this->instructorId = $instructorId;
        $this->subject = $subject;
        $this->note = $note;
    }

    public function occurrenceId(): UuidInterface
    {
        return $this->occurrenceId;
    }

    public function instructorId(): ?UuidInterface
    {
        return $this->instructorId;
    }

    public function subject(): Subject
    {
        return $this->subject;
    }

    public function note(): Note
    {
        return $this->note;
    }
}
