<?php
namespace Gyman\Domain\Calendar\Event;

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

    /** @var string */
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