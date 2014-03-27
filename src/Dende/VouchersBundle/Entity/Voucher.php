<?php

namespace Dende\VouchersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Dende\VouchersBundle\Validator\VoucherDateConstraint;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTime;

/**
 * Voucher
 *
 * @ORM\Table("vouchers")
 * @ORM\Entity(repositoryClass="Dende\VouchersBundle\Entity\VoucherRepository")
 * @VoucherDateConstraint
 * 
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Voucher {
// <editor-fold defaultstate="collapsed" desc="fields">

    /**
     * @ORM\ManyToMany(targetEntity="Dende\ScheduleBundle\Entity\Activity", inversedBy="vouchers")
     * @ORM\JoinTable(name="vouchers_activities")
     */
    private $activities;

    /**
     * @ORM\OneToMany(targetEntity="Dende\EntriesBundle\Entity\Entry", mappedBy="voucher")
     * @ORM\JoinTable(name="entries")
     */
    private $entries;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * 
     * @ORM\ManyToOne(targetEntity="Dende\MembersBundle\Entity\Member", inversedBy="vouchers")
     * @ORM\JoinColumn(name="member_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $member;

    /**
     * @var \DateTime
     * @Assert\NotNull(message = "Należy podać datę początkową")
     * @ORM\Column(name="startDate", type="datetime", nullable = true)
     */
    private $startDate;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="endDate", type="datetime", nullable = true)
     */
    private $endDate;

    /**
     * @var float
     * 
     * @ORM\Column(name="price", type="decimal", scale=2, nullable = true)
     * @Assert\Regex("/^\d+(\.\d\d){0,1}$/")
     */
    private $price;

    /**
     * @var integer
     * @Assert\Range(
     *      min = 1,
     *      max = 999,
     *      minMessage = "Najmniejsza możliwa liczba wejść na karnet to 1",
     *      maxMessage = "Maksymalna liczba wejść na karnet to 999")
     * @ORM\Column(name="amount", type="integer", nullable = true)
     */
    private $amount;

    /**
     * @var integer
     * 
     * @ORM\Column(name="barcode", type="string", nullable = true, unique = true, length = 32)
     */
    private $barcode;

    /**
     * @var integer
     * 
     * @ORM\Column(name="amount_left", type="integer", nullable = true)
     */
    private $amountLeft;

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

    public function getAmountLeft() {
        return $this->amountLeft;
    }

    public function setAmountLeft($amountLeft) {
        $this->amountLeft = $amountLeft;
        return $this;
    }

    public function getBarcode() {
        return $this->barcode;
    }

    public function setBarcode($barcode) {
        $this->barcode = $barcode;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getMember() {
        return $this->member;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function getEndDate() {
        return $this->endDate ? $this->endDate : null;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setMember($member) {
        $this->member = $member;
        return $this;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
        return $this;
    }

    public function setEndDate($endDate = null) {
        $this->endDate = $endDate ? clone $endDate : null;
        return $this;
    }

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
        return $this;
    }

    public function getEntries() {
        return $this->entries;
    }

    public function setEntries($entries) {
        $this->entries = $entries;
        return $this;
    }

    public function getActivities() {
        return $this->activities;
    }

    public function setActivities($activities) {
        $this->activities = $activities;
        return $this;
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
}
