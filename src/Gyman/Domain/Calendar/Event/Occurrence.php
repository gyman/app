<?php
namespace Gyman\Domain\Calendar\Event;

use DateTime;
use Dende\Calendar\Domain\Calendar\Event;
use Dende\Calendar\Domain\Calendar\Event\Occurrence\Duration;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\ClubBundle\Entity\User;
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
     * @var string
     */
    protected $instructorId;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $note;

    /**
     * @var ArrayCollection|Entry[]
     */
    protected $entries;

    public function __construct($id, DateTime $startDate, Duration $duration, Event $event, User $instructor = null, $subject = '', $note = '', ArrayCollection $entries = null)
    {
        parent::__construct($id, $startDate, $duration, $event);
    }

    /**
     * @return mixed
     */
    public function instructor()
    {
        return $this->instructor;
    }

    /**
     * @return mixed
     */
    public function subject()
    {
        return $this->subject;
    }

    /**
     * @return mixed
     */
    public function note()
    {
        return $this->note;
    }

    /**
     * @param User $user
     */
    public function setInstructor(User $user)
    {
        $this->instructor = $user;
    }

    /**
     * @return string
     */
    public function instructorId()
    {
        return $this->instructorId;
    }

    /**
     * @return ArrayCollection|\Gyman\Domain\Entry[]
     */
    public function entries()
    {
        return $this->entries;
    }
}