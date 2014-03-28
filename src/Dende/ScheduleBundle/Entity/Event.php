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
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="event_type", type="string")
 * @ORM\DiscriminatorMap({
 *      "recurring" = "Dende\ScheduleBundle\Entity\RecurringEvent",
 *      "single" = "Dende\ScheduleBundle\Entity\SingleEvent",
 *      "incycle" = "Dende\ScheduleBundle\Entity\IncycleEvent",
 *      "hidden" = "Dende\ScheduleBundle\Entity\HiddenEvent"
 * })
 */
class Event {
    // <editor-fold defaultstate="collapsed" desc="members">

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Dende\ScheduleBundle\Entity\Activity", inversedBy="events")
     * @ORM\JoinColumn(name="activity_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $activity;

    /**
     * @ORM\OneToMany(targetEntity="Dende\EntriesBundle\Entity\Entry", mappedBy="event")
     */
    protected $entries;

    /**
     * @var \DateTime
     * @ORM\Column(name="start_date", type="datetime", nullable = false)
     */
    protected $startDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="end_date", type="datetime", nullable = true)
     */
    protected $endDate;

    /**
     * @var integer 
     * @ORM\Column(name="duration", type="integer", nullable = false)
     */
    protected $duration;

    /**
     * @var DateTime $created
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $created;

    /**
     * @var DateTime $modified
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="modified_at", type="datetime", nullable=false)
     */
    protected $modified;

    /**
     * @var Datetime $deletedAt
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    protected $deletedAt; // </editor-fold>
    protected $type = "";

    // <editor-fold defaultstate="collapsed" desc="setters and getters">

    public function getType() {
        return $this->type;
    }

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

    public function getStartDate() {
        return $this->startDate;
    }

    public function getDuration() {
        return $this->duration * 60;
    }

    public function setStartDate(\DateTime $startDate) {
        $this->startDate = $startDate;
    }

    public function setDuration($duration) {
        $this->duration = $duration;
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

// </editor-fold>
}
