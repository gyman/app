<?php
namespace Gyman\Domain\Member;

/**
 * Class EmailAddress
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

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    function __toString()
    {
        return $this->email();
    }


}
