<?php
namespace Gyman\Bundle\MembersBundle\DTO;

use DateTime;

/**
 * Class MemberDTO
 * @package Gyman\Bundle\MembersBundle
 */
class MemberDTO
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $firstname;

    /**
     * @var string
     */
    public $lastname;

    /**
     * @var DateTime
     */
    public $birthdate;

    /**
     * @var string
     */
    public $gender;

    /**
     * @var string
     */
    public $zipcode;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $barcode;

    /**
     * @var string
     */
    public $belt;

    /**
     * @var string
     */
    public $notes;

    /**
     * @var string
     */
    public $foto;
}
