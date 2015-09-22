<?php
namespace Gyman\Domain\Model;

use Gyman\Domain\Command\UpdateMemberCommand;

/**
 * Class Details
 * @package Gyman\Domain
 */
class Details
{
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    /**
     * @var array
     */
    public static $genders = [
        self::GENDER_MALE,
        self::GENDER_FEMALE,
    ];

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
     * Details constructor.
     * @param string $firstname
     * @param string $lastname
     * @param \DateTime $birthdate
     * @param string $phone
     * @param string $notes
     * @param Foto $foto
     * @param string $zipcode
     * @param string $gender
     * @param Belt $belt
     * @param Barcode $barcode
     * @param bool $starred
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

    public static function createFromMemberUpdateCommand(UpdateMemberCommand $command)
    {
        return new self(
            $command->firstname,
            $command->lastname,
            $command->birthdate,
            $command->phone,
            $command->notes,
            new Foto($command->foto),
            $command->zipcode,
            $command->gender,
            new Belt($command->belt),
            new Barcode($command->barcode),
            $command->starred
        );
    }

    /**
     * @return boolean
     */
    public function isStarred()
    {
        return $this->starred;
    }

    /**
     * @return Barcode
     */
    public function barcode()
    {
        return $this->barcode;
    }

    /**
     * @return Belt
     */
    public function belt()
    {
        return $this->belt;
    }

    /**
     * @return string
     */
    public function gender()
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function zipcode()
    {
        return $this->zipcode;
    }

    /**
     * @return Foto
     */
    public function foto()
    {
        return $this->foto;
    }

    /**
     * @return string
     */
    public function notes()
    {
        return $this->notes;
    }

    /**
     * @return string
     */
    public function phone()
    {
        return $this->phone;
    }

    /**
     * @return \DateTime
     */
    public function birthdate()
    {
        return $this->birthdate;
    }

    /**
     * @return string
     */
    public function lastname()
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function firstname()
    {
        return $this->firstname;
    }

    public function hasValidData()
    {
        return !empty($this->firstname) || !empty($this->lastname);
    }
}
