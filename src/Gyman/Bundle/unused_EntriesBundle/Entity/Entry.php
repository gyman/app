<?php

namespace Gyman\Bundle\EntriesBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gyman\Bundle\AppBundle\Entity\Member;
use Gyman\Bundle\AppBundle\Entity\Voucher;
use Gyman\Bundle\ScheduleBundle\Entity\Occurence;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Entry

 * @ORM\Table("entries")
 * @ORM\Entity(repositoryClass="Gyman\Bundle\EntriesBundle\Entity\EntryRepository")
 *
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @codeCoverageIgnore
 */
class Entry
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\AppBundle\Entity\Member", inversedBy="entries")
     * @ORM\JoinColumn(name="member_id", referencedColumnName="id", onDelete="SET NULL")
     * @var Member
     */
    private $member;

    /**
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\AppBundle\Entity\Voucher", inversedBy="entries")
     * @ORM\JoinColumn(name="voucher_id", referencedColumnName="id", onDelete="SET NULL")
     * @var Voucher
     */
    private $voucher;

    /**
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\ScheduleBundle\Entity\Occurence", inversedBy="entries")
     * @ORM\JoinColumn(name="occurence_id", referencedColumnName="id", onDelete="SET NULL")
     * @var Occurence
     */
    private $occurence;

    /**
     * @var string $entryType
     *
     * @ORM\Column(name="entry_type", type="string", columnDefinition="enum('free', 'voucher', 'paid', 'multisport')", nullable=false)
     * @Assert\NotBlank(message = "Pole nie może być puste!")
     */
    private $entryType;

    /**
     * @var string $entryPrice
     *
     * @ORM\Column(name="entry_price", type="decimal", scale=2, nullable=true)
     * @Assert\Regex("/^\d+(\.\d\d){0,1}$/")
     */
    private $entryPrice;

    /**
     * @var \DateTime
     * @ORM\Column(name="startDate", type="datetime", nullable = true)
     */
    private $startDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="endDate", type="datetime", nullable = true)
     */
    private $endDate;

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

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Voucher
     */
    public function getVoucher()
    {
        return $this->voucher;
    }

    /**
     * @return Occurence
     */
    public function getOccurence()
    {
        return $this->occurence;
    }

    public function getEntryType()
    {
        return $this->entryType;
    }

    public function getEntryPrice()
    {
        return $this->entryPrice;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setVoucher($voucher)
    {
        $this->voucher = $voucher;

        return $this;
    }

    public function setOccurence(Occurence $occurence)
    {
        $this->occurence = $occurence;

        return $this;
    }

    public function setEntryType($entryType)
    {
        $this->entryType = $entryType;

        return $this;
    }

    public function setEntryPrice($entryPrice)
    {
        $this->entryPrice = $entryPrice;

        return $this;
    }

    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = clone($startDate);

        return $this;
    }

    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function setCreated(DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    public function setModified(DateTime $modified)
    {
        $this->modified = $modified;

        return $this;
    }

    public function setDeletedAt(Datetime $deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getMember()
    {
        return $this->member;
    }

    public function setMember(Member $member)
    {
        $this->member = $member;

        return $this;
    }

    public function isOpened()
    {
        return !is_null($this->getStartDate()) && is_null($this->getEndDate());
    }
}
