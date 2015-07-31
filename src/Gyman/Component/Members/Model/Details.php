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
     * @var string
     */
    protected $foto = 'no-profile.gif';

    /**
     * @var string $zipcode
     */
    protected $zipcode;

    /**
     * @var string $gender
     */
    protected $gender;

    /**
     * @var string
     */
    protected $belt;

    /**
     * @var integer
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
}
