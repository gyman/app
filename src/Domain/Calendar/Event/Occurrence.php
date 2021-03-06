<?php
namespace Gyman\Domain\Calendar\Event;

use DateTime;
use Dende\Calendar\Domain\Calendar\Event\Occurrence\OccurrenceDuration;
use Dende\Calendar\Domain\Calendar\EventInterface;
use Dende\Calendar\Domain\IdInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gyman\Domain\User;
use Gyman\Domain\Calendar\Event\Occurrence\Note;
use Gyman\Domain\Calendar\Event\Occurrence\Subject;
use Gyman\Domain\Entry;
use Dende\Calendar\Domain\Calendar\Event\Occurrence as BaseOccurrence;

/**
 * Class Occurrence
 * @package Gyman\Domain\Calendar\Event
 */
class Occurrence extends BaseOccurrence
{
    /**
     * @var User
     */
    protected $instructor;

    /**
     * @var Subject
     */
    protected $subject;

    /**
     * @var Note
     */
    protected $note;

    /**
     * @var ArrayCollection|Entry[]
     */
    protected $entries;

    public function __construct(IdInterface $occurrenceId, EventInterface $event, DateTime $startDate = null, OccurrenceDuration $duration = null, User $instructor = null, Subject $subject = null, Note $note = null, ArrayCollection $entries = null)
    {
        parent::__construct($occurrenceId, $event, $startDate, $duration);

        $this->instructor = $instructor;
        $this->subject = $subject ?: new Subject();
        $this->note = $note ?: new Note();
        $this->entries = $entries;
    }

    public function instructor() : ?User
    {
        return $this->instructor;
    }

    public function subject() : Subject
    {
        return $this->subject;
    }

    public function note() : Note
    {
        return $this->note;
    }

    public function assignInstructor(User $user) : void
    {
        $this->instructor = $user;
    }

    /**
     * @return Collection|Entry[]
     */
    public function entries() : Collection
    {
        return $this->entries;
    }

    public function updateSubject(Subject $subject) : void
    {
        $this->subject = $subject;
    }

    public function updateNote(Note $note) : void
    {
        $this->note = $note;
    }
}