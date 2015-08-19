<?php

namespace Gyman\Component\Members\Model;

/**
 * Class MemberEmail
 * @package Gyman\Component\Members
 */
class EmailAddress
{
    /**
     * @var string
     */
    protected $email;

    /**
     * MemberEmail constructor.
     * @param $email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * @param EmailAddress $email
     * @return bool
     */
    public function equals(EmailAddress $email)
    {
        return $this->email === $email->email();
    }

    /**
     * @return mixed
     */
    public function email()
    {
        return $this->email;
    }
}
