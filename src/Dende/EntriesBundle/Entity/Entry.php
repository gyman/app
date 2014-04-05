<?php

namespace Dende\EntriesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Dende\EntriesBundle\Validator as Validate;

/**
 * Entry
 * @Assert\Callback(methods={
 *     { "Dende\EntriesBundle\Validator\LeftAmountValidator", "isAmountLeft"},
 *     { "Dende\EntriesBundle\Validator\PriceNotBlankIfPaidEntryTypeValidator", "isPaidAndPriceSet"},
 * })
 * @ORM\Table("entries")
 * @ORM\Entity(repositoryClass="Dende\EntriesBundle\Entity\EntryRepository")
 *
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Entry {
// <editor-fold defaultstate="collapsed" desc="fields">

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Validate\ActivityConstraint
     * @ORM\ManyToOne(targetEntity="Dende\ScheduleBundle\Entity\Activity")
     * @ORM\JoinColumn(name="activity_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $activity;

    /**
     * @ORM\ManyToOne(targetEntity="Dende\VouchersBundle\Entity\Voucher", inversedBy="entries")
     * @ORM\JoinColumn(name="voucher_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $voucher;

    /**
     * @ORM\ManyToOne(targetEntity="Dende\ScheduleBundle\Entity\Occurence", inversedBy="entries")
     * @ORM\JoinColumn(name="occurence_id", referencedColumnName="id", onDelete="SET NULL")
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

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="setters and getters">
    public function getId() {
        return $this->id;
    }

    public function getActivity() {
        return $this->activity;
    }

    public function getVoucher() {
        return $this->voucher;
    }

    public function getOccurence() {
        return $this->occurence;
    }

    public function getEntryType() {
        return $this->entryType;
    }

    public function getEntryPrice() {
        return $this->entryPrice;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function getEndDate() {
        return $this->endDate;
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
        return $this;
    }

    public function setActivity($activity) {
        $this->activity = $activity;
        return $this;
    }

    public function setVoucher($voucher) {
        $this->voucher = $voucher;
        return $this;
    }

    public function setOccurence($occurence) {
        $this->occurence = $occurence;
        return $this;
    }

    public function setEntryType($entryType) {
        $this->entryType = $entryType;
        return $this;
    }

    public function setEntryPrice($entryPrice) {
        $this->entryPrice = $entryPrice;
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

// </editor-fold>

    public function isOpened() {
        return !is_null($this->getStartDate()) && is_null($this->getEndDate());
    }

}
