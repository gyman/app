<?php

namespace Gyman\Bundle\MembersBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Gyman\Component\Members\Model\Member as BaseMember;

/**
 * Member
 * @codeCoverageIgnore
 */
final class Member extends BaseMember
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nameSlug;

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * @var DateTime
     */
    private $updatedAt;

    /**
     * @var Datetime $deletedAt
     */
    private $deletedAt;

    public function getStarred()
    {
        return $this->starred;
    }

    public function setStarred($starred)
    {
        $this->starred = $starred;
    }

    public function getBeltN()
    {
        return $this->beltN;
    }

    public function setBeltN($beltN)
    {
        $this->beltN = $beltN;

        return $this;
    }

    public function getBarcode()
    {
        return $this->barcode;
    }

    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;

        return $this;
    }

    public function getEntries()
    {
        return $this->entries;
    }

    public function setEntries($entries)
    {
        $this->entries = $entries;

        return $this;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified(DateTime $modified)
    {
        $this->modified = $modified;

        return $this;
    }

    public function getNameSlug()
    {
        return $this->nameSlug;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setNameSlug($nameSlug)
    {
        $this->nameSlug = $nameSlug;

        return $this;
    }

    public function setCreated(DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    public function getBelt()
    {
        return $this->belt;
    }

    public function setBelt($belt)
    {
        $this->belt = $belt;

        return $this;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

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
     * @param  string $name
     * @return Member
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

    /**
     * Set birthdate
     *
     * @param  \DateTime $birthdate
     * @return Member
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set phone
     *
     * @param  string $phone
     * @return Member
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param  string $email
     * @return Member
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set notes
     *
     * @param  string $notes
     * @return Member
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set foto
     *
     * @param  string $foto
     * @return Member
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return Globals::applyGalleryDir($this->foto);
    }

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function getVouchers()
    {
        return $this->vouchers;
    }

    public function setVouchers($vouchers)
    {
        $this->vouchers = $vouchers;

        return $this;
    }

    public function getCurrentVoucher()
    {
        return $this->currentVoucher;
    }

    public function setCurrentVoucher($currentVoucher)
    {
        $this->currentVoucher = $currentVoucher;

        return $this;
    }

    /**
     *
     * @return Entry
     */
    public function getLastEntry()
    {
        return $this->lastEntry;
    }

    /**
     *
     * @return Member
     */
    public function setLastEntry($lastEntry)
    {
        $this->lastEntry = $lastEntry;

        return $this;
    }

    public function __construct()
    {
        $this->vouchers = new ArrayCollection();
        $this->sections = new ArrayCollection();
    }

    public function hasOpenedEntry()
    {
        return !is_null($this->getLastEntry()) && $this->getLastEntry()->isOpened();
    }

    public function isMale()
    {
        return $this->gender == self::GENDER_MALE;
    }

    /**
     * @return mixed
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * @param mixed $sections
     */
    public function setSections($sections)
    {
        $this->sections = $sections;
    }
}
