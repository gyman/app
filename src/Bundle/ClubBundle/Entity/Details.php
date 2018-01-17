<?php
namespace Gyman\Bundle\ClubBundle\Entity;

class Details
{
    /** @var null string */
    public $address;

    /** @var null string */
    public $zipcode;

    /** @var null string */
    public $city;

    /** @var null string */
    public $country;

    /** @var null string */
    public $phone_number;

    /** @var null string */
    public $email_address;

    /** @var null string */
    public $opened_from;

    /** @var null string */
    public $opened_till;

    /** @var null string */
    public $logo;

    /** @var null string */
    public $about;

    /** @var null string */
    public $account_number;

    public function __construct(?string $address = null, ?string $zipcode = null, ?string $city = null, ?string $country = null, ?string $phone_number = null, ?string $email_address = null, ?string $opened_from = null, ?string $opened_till = null, ?string $logo = null, ?string $about = null, ?string $account_number = null)
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

    public function address() : ?string
    {
        return $this->address;
    }

    public function zipcode() : ?string
    {
        return $this->zipcode;
    }

    public function city() : ?string
    {
        return $this->city;
    }

    public function country() : ?string
    {
        return $this->country;
    }

    public function phone_number() : ?string
    {
        return $this->phone_number;
    }

    public function email_address() : ?string
    {
        return $this->email_address;
    }

    public function opened_from() : ?string
    {
        return $this->opened_from;
    }

    public function opened_till() : ?string
    {
        return $this->opened_till;
    }

    public function logo() : ?string
    {
        return $this->logo;
    }

    public function about() : ?string
    {
        return $this->about;
    }

    public function accountNumber() : ?string
    {
        return $this->account_number;
    }
}
