<?php

namespace Dende\ScheduleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Dende\ScheduleBundle\Entity\Activity;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Dende\DefaultBundle\Validator as DefaultBundle;
use JMS\Serializer\Annotation as JMS;
/**
 * Event
 *
 * @ORM\Table("`events")
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

    const SUPER = "event";
    const WEEKLY = "weekly";
    const SINGLE = "single";

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
     * Dende\ScheduleBundle\Validator\RequiredIfNoNewActivity
     * @JMS\Exclude
     * @ORM\ManyToOne(targetEntity="Dende\ScheduleBundle\Entity\Activity", inversedBy="events",cascade={"persist"})
     * @Assert\NotBlank(
     *  groups={"dbActivity"}
     * )
     * @ORM\JoinColumn(name="activity_id", referencedColumnName="id", nullable = false)
     */
    protected $activity;

    /**
     * @JMS\Exclude
     * @ORM\OneToMany(targetEntity="Dende\ScheduleBundle\Entity\Occurence", mappedBy="event",cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $occurences;

    /**
     * @var \DateTime
     * Assert\DateTime(message="Data musi być w formacie DD.MM.RR HH:MM")
     * DefaultBundle\DateRangeConstraint(
     *      min="last sunday",
     * )
     * @Assert\NotBlank(
     *  groups={"new","edit"}
     * )
     * @ORM\Column(name="start_date", type="datetime", nullable = false)
     */
    protected $startDate;

    /**
     * @var \DateTime
     * @Assert\Date(message="Data musi być w formacie DD.MM.RR")
     * @DefaultBundle\DateRangeConstraint(
     *      min="last sunday",
     *      max="+1 year +1 day"
     * )
     * @Assert\NotBlank(
     *  groups={"serial","weekly"}
     * )
     * @ORM\Column(name="end_date", type="datetime", nullable = true)
     */
    protected $endDate;

    /**
     * @var integer 
     * @Assert\NotBlank(
     *  groups={"default","new", "edit"}
     * )
     * @ORM\Column(name="duration", type="integer", nullable = false)
     */
    protected $duration = 90;

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
    protected $type = "event";

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

    public function setStartDate($startDate) {
        
        $this->startDate = $startDate;
        return $this;
    }

    public function setEndDate($endDate) {
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
        $this->startDate = new DateTime();
        $this->endDate = new DateTime("+1 year");
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata) {
//        $metadata->addPropertyConstraint('startDate', new Assert\GreaterThan(array(
//            'value' => date("Y-m-d H:i:s"),
//        )));
//        $metadata->addPropertyConstraint('endDate', new Assert\LessThan(array(
//            'value' => date("Y-m-d H:i:s", strtotime("+1 year +1 day")),
//        )));
    }

    public function isNew() {
        return $this->getId() === null;
    }

    public function isWeekly() {
        return $this->getType() === self::WEEKLY;
    }

    public function isSuper() {
        return $this->getType() === self::SUPER;
    }

    public function isSingle() {
        return $this->getType() === self::SINGLE;
    }

}
