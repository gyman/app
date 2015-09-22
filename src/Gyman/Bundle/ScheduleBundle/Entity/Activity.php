<?php
namespace Gyman\Bundle\ScheduleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;

/**
 * Activity
 *
 * @ORM\Table("activities")
 * @ORM\Entity(repositoryClass="Gyman\Bundle\ScheduleBundle\Entity\ActivityRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @codeCoverageIgnore
 * @Serializer\ExclusionPolicy("all")
 */
class Activity
{
    /**
     * @ORM\ManyToMany(targetEntity="Gyman\Bundle\AppBundle\Entity\Voucher" , mappedBy="activities")
     */
    private $vouchers;

    /**
     * @ORM\OneToMany(targetEntity="Gyman\Bundle\ScheduleBundle\Entity\Event", mappedBy="activity")
     */
    private $events;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     */
    private $id;

    /**
     * @var string
     *
     * @Serializer\Expose()
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var DateTime $created
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var DateTime $modified
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="modified", type="datetime", nullable=true)
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param  string   $name
     * @return Activity
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function getVouchers()
    {
        return $this->vouchers;
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function setVouchers($vouchers)
    {
        $this->vouchers = $vouchers;

        return $this;
    }

    public function setEvents($events)
    {
        $this->events = $events;

        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
