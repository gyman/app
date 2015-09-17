<?php
namespace Gyman\Domain\Model;

/**
 * Class MemberEmail
 * @package Gyman\Domain
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
     * @param $command
     * @return EmailAddress
     */
    public static function createFromMemberUpdateCommand($command)
    {
        return new self($command->email);
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
