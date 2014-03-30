<?php

namespace Dende\ScheduleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Dende\ScheduleBundle\Entity\Activity;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTime;

/**
 * EventMeta
 *
 * @ORM\Table("events_meta")
 * @ORM\Entity(repositoryClass="Dende\ScheduleBundle\Entity\EventMetaRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="meta_type", type="string")
 * @ORM\DiscriminatorMap({
 *      "description" = "Dende\ScheduleBundle\Entity\Description",
 *      "deleted" = "Dende\ScheduleBundle\Entity\Deleted",
 * })
 */
class EventMeta {
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
     * @ORM\ManyToOne(targetEntity="Dende\ScheduleBundle\Entity\Event", inversedBy="meta")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $event;

    /**
     * @var \DateTime
     * @ORM\Column(name="start_date", type="datetime", nullable = false)
     */
    protected $startDate;

    /**
     * @var string
     * @ORM\Column(name="meta_key", type="string", nullable = false)
     */
    protected $key;

    /**
     * @var string
     * @ORM\Column(name="meta_value", type="string", nullable = false)
     */
    protected $value;

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

    // </editor-fold>
}
