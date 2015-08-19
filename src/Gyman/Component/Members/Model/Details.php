<?php

namespace Gyman\Component\Members\Model;

/**
 * Class Details
 * @package Gyman\Component\Members
 */
class Details
{
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var \DateTime
     */
    protected $birthdate;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $notes;

    /**
     * @var Foto
     */
    protected $foto;

    /**
     * @var string $zipcode
     */
    protected $zipcode;

    /**
     * @var string $gender
     */
    protected $gender;

    /**
     * @var Belt
     */
    protected $belt;

    /**
     * @var Barcode
     */
    protected $barcode;

    /**
     * @var boolean
     */
    protected $starred;

    /**
     * @var integer
     */
    protected $beltN;

    /**
     * Details constructor.
     * @param string $firstname
     * @param string $lastname
     * @param \DateTime $birthdate
     * @param string $phone
     * @param string $notes
     * @param string $foto
     * @param string $zipcode
     * @param string $gender
     * @param string $belt
     * @param int $barcode
     * @param bool $starred
     * @param int $beltN
     */
    public function __construct($firstname, $lastname, \DateTime $birthdate, $phone, $notes, Foto $foto, $zipcode, $gender, Belt $belt, Barcode $barcode, $starred)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthdate = $birthdate;
        $this->phone = $phone;
        $this->notes = $notes;
        $this->foto = $foto;
        $this->zipcode = $zipcode;
        $this->gender = $gender;
        $this->belt = $belt;
        $this->barcode = $barcode;
        $this->starred = $starred;
    }

    /**
     * @return int
     */
    public function getBeltN()
    {
        return $this->beltN;
    }

    /**
     * @return boolean
     */
    public function isStarred()
    {
        return $this->starred;
    }

    /**
     * @return int
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @return string
     */
    public function getBelt()
    {
        return $this->belt;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    public function hasValidData()
    {
        return !empty($this->firstname) || !empty($this->lastname);

    }
}
