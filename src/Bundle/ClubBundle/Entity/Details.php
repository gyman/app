<?php
namespace Gyman\Bundle\ClubBundle\Entity;

class Details
{
    public $address;
    public $zipcode;
    public $city;
    public $country;
    public $phone_number;
    public $email_address;
    public $opened_from;
    public $opened_till;
    public $logo;
    public $about;
    public $account_number;

    /**
     * Details constructor.
     * @param $address
     * @param $zipcode
     * @param $city
     * @param $country
     * @param $phone_number
     * @param $email_address
     * @param $opened_from
     * @param $opened_till
     * @param $logo
     * @param $about
     * @param $account_number
     * @param $upload_foto
     */
    public function __construct($address = null, $zipcode = null, $city = null, $country = null, $phone_number = null, $email_address = null, $opened_from = null, $opened_till = null, $logo = null, $about = null, $account_number = null)
    {
        $this->address = $address;
        $this->zipcode = $zipcode;
        $this->city = $city;
        $this->country = $country;
        $this->phone_number = $phone_number;
        $this->email_address = $email_address;
        $this->opened_from = $opened_from;
        $this->opened_till = $opened_till;
        $this->logo = $logo;
        $this->about = $about;
        $this->account_number = $account_number;
    }
}