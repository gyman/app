<?php

namespace Dende\ScheduleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Dende\ScheduleBundle\Entity\Activity;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * Event
 *
 * @ORM\Table("events")
 * @ORM\Entity(repositoryClass="Dende\ScheduleBundle\Entity\EventRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="event_type", type="string")
 * @ORM\DiscriminatorMap({
 *      "single" = "Dende\ScheduleBundle\Entity\Single",
 *      "weekly" = "Dende\ScheduleBundle\Entity\Weekly",
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
     * @ORM\OneToMany(targetEntity="Dende\ScheduleBundle\Entity\Occurence", mappedBy="event", cascade={"persist", "remove", "merge"})
     */
    protected $occurences;

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

    public function getId() {
        return $this->id;
    }

    public function getActivity() {
        return $this->activity;
    }

    public function getOccurences() {
        return $this->occurences;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function getDuration() {
        return $this->duration;
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

    public function getType() {
        return $this->type;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setActivity($activity) {
        $this->activity = $activity;
        return $this;
    }

    public function setOccurences($occurences) {
        $this->occurences = $occurences;
        return $this;
    }

    public function setStartDate(\DateTime $startDate) {
        $this->startDate = $startDate;
        return $this;
    }

    public function setEndDate(\DateTime $endDate) {
        $this->endDate = $endDate;
        return $this;
    }

    public function setDuration($duration) {
        $this->duration = $duration;
        return $this;
    }

    public function setCreated(DateTime $created) {
        $this->created = $created;
        return $this;
    }

    public function setModified(DateTime $modified) {
        $this->modified = $modified;
        return $this;
    }

    public function setDeletedAt(Datetime $deletedAt) {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

// </editor-fold>

    function __construct() {
        $this->entries = new ArrayCollection();
        $this->meta = new ArrayCollection();
        $this->endDate = new DateTime("2015-12-31 23:59:59");
    }

    function getDescriptionForDate(DateTime $date) {
        $criteria = Criteria::create();
        $criteria->where(
                Criteria::expr()->andX(
                        Criteria::expr()->eq("key", "description"), Criteria::expr()->eq("startDate", $date)
                )
        );

        $result = $this->meta->matching($criteria);

        if (count($result) == 0)
        {
            return null;
        }

        return $result->first()->getDescription();
    }

    function getDeletedEvents() {
        return new ArrayCollection(
                array_filter($this->getMeta()->toArray(), function($meta) {
                    return $meta->getKey() == "deleted";
                })
        );
    }

}
