<?php

namespace Dende\ScheduleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Dende\ScheduleBundle\Entity\Activity;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTime;

/**
 * Event
 *
 * @ORM\Table("events")
 * @ORM\Entity(repositoryClass="Dende\ScheduleBundle\Entity\EventRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Event {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Dende\ScheduleBundle\Entity\Activity", inversedBy="events")
     * @ORM\JoinColumn(name="activity_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $activity;

    /**
     * @ORM\OneToMany(targetEntity="Dende\EntriesBundle\Entity\Entry", mappedBy="event")
     */
    private $entries;

    /**
     * @var string
     *
     * @ORM\Column(name="day_of_week", type="string", columnDefinition="enum('monday','tuesday','wednesday','thursday','friday','saturday','sunday')", nullable=true)
     */
    private $dayOfWeek;

    /**
     * @var string
     * @Assert\Regex("/\d\d:\d\d/")
     * @ORM\Column(name="start_hour", type="string", length=255)
     */
    private $startHour;

    /**
     * @var string
     * @Assert\Regex("/\d\d:\d\d/")
     * @ORM\Column(name="end_hour", type="string", length=255)
     */
    private $endHour;

    /**
     * @var DateTime $created
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var DateTime $modified
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * @var Datetime $deletedAt
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set activity
     *
     * @param Activity $activity
     * @return Event
     */
    public function setActivity(Activity $activity) {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return integer 
     */
    public function getActivity() {
        return $this->activity;
    }

    /**
     * Set dayOfWeek
     *
     * @param string $dayOfWeek
     * @return Event
     */
    public function setDayOfWeek($dayOfWeek) {
        $this->dayOfWeek = $dayOfWeek;

        return $this;
    }

    /**
     * Get dayOfWeek
     *
     * @return string
     */
    public function getDayOfWeek() {
        return $this->dayOfWeek;
    }

    /**
     * Set startHour
     *
     * @param string $startHour
     * @return Event
     */
    public function setStartHour($startHour) {
        $this->startHour = $startHour;

        return $this;
    }

    /**
     * Get startHour
     *
     * @return string 
     */
    public function getStartHour() {
        return $this->startHour;
    }

    /**
     * Set endHour
     *
     * @param string $endHour
     * @return Event
     */
    public function setEndHour($endHour) {
        $this->endHour = $endHour;

        return $this;
    }

    /**
     * Get endHour
     *
     * @return string 
     */
    public function getEndHour() {
        return $this->endHour;
    }

    public function getEntries() {
        return $this->entries;
    }

    public function getCreated() {
        return $this->created;
    }

    public function getModified() {
        return $this->modified;
    }

    public function getDeletedAt() {
        return $this->deletedAt;
    }

    public function setEntries($entries) {
        $this->entries = $entries;
    }

    public function setCreated(DateTime $created) {
        $this->created = $created;
    }

    public function setModified(DateTime $modified) {
        $this->modified = $modified;
    }

    public function setDeletedAt(Datetime $deletedAt) {
        $this->deletedAt = $deletedAt;
    }

}
