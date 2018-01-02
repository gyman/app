<?php

declare(strict_types=1);

namespace Gyman\Domain\Member;

/**
 * Class EmailAddress.
 */
class EmailAddress
{
    /**
     * @var string
     */
    protected $email;

    /**
     * MemberEmail constructor.
     *
     * @param $email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     *
     * @see http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    public function __toString()
    {
        return $this->email();
    }

    /**
     * @param $command
     *
     * @return EmailAddress
     */
    public static function createFromMemberUpdateCommand($command)
    {
        return new self($command->email);
    }

    /**
     * @param EmailAddress $email
     *
     * @return bool
     */
    public function equals(self $email)
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
     * @return bool
     */
    public function isInternal()
    {
        return (bool) strpos($this->email, '@gyman.pl');
    }
}
