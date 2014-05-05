<?php

namespace Dende\ScheduleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Dende\ScheduleBundle\Entity\Activity;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as JMS;
use DateTime;

/**
 * OccurenceMeta
 *
 * @ORM\Table("events_occurences")
 * @ORM\Entity(repositoryClass="Dende\ScheduleBundle\Entity\OccurenceRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="occurence_type", type="string")
 * @ORM\DiscriminatorMap({
 *      "serial" = "Dende\ScheduleBundle\Entity\Serial",
 *      "singular" = "Dende\ScheduleBundle\Entity\Singular",
 * })
 */
class Occurence {

    const SERIAL = "serial";
    const SINGULAR = "singular";

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
     * @JMS\Exclude
     * @ORM\ManyToOne(targetEntity="Dende\ScheduleBundle\Entity\Event", inversedBy="occurences",cascade={"persist"})
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $event;

    /**
     * @JMS\Exclude
     * @ORM\OneToMany(targetEntity="Dende\EntriesBundle\Entity\Entry", mappedBy="occurence")
     */
    protected $entries;

    /**
     * @var \DateTime
     * @ORM\Column(name="start_date", type="datetime", nullable = false)
     */
    protected $startDate;

    /**
     * @var integer 
     * @ORM\Column(name="duration", type="integer", nullable = true)
     */
    protected $duration;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", nullable = true)
     */
    protected $description;

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

    // <editor-fold defaultstate="collapsed" desc="setters and getters">

    public function getId() {
        return $this->id;
    }

    public function getEvent() {
        return $this->event;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function getKey() {
        return $this->key;
    }

    public function getValue() {
        return $this->value;
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

    public function setId($id) {
        $this->id = $id;
    }

    public function setEvent($event) {
        $this->event = $event;
    }

    public function setStartDate(\DateTime $startDate) {
        $this->startDate = $startDate;
    }

    public function setKey($key) {
        $this->key = $key;
    }

    public function setValue($value) {
        $this->value = $value;
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

    public function getEntries() {
        return $this->entries;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setEntries($entries) {
        $this->entries = $entries;
        return $this;
    }

    public function setDuration($duration) {
        $this->duration = $duration;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    // </editor-fold>

    public function isPast() {
        return $this->getStartDate()->getTimestamp() < time();
    }

    /**
     * 
     * @return \DateTime
     */
    public function getEndDate() {
        /**
         * @var \DateTime $endDate
         */
        $endDate = clone($this->getStartDate());
        $diff = new \DateInterval(sprintf("PT%dM", abs($this->duration)));
        $endDate->add($diff);

        return $endDate;
    }

}
