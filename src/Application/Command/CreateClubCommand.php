<?php

declare(strict_types=1);

namespace Gyman\Application\Command;

use Symfony\Component\Console\Input\InputInterface;

class CreateClubCommand
{
    /**
     * Username used for logging in.
     *
     * @var string
     */
    public $username;

    /**
     * Email address of user.
     *
     * @var string
     */
    public $email;

    /**
     * Password for credentials.
     *
     * @var string
     */
    public $password;
    /**
     * Password for credentials.
     *
     * @var string
     */
    public $password_repeat;

    /**
     * Clubs name.
     *
     * @var string
     */
    public $club;

    /**
     * Subdomain used for a club tenant.
     *
     * @var string
     */
    public $subdomain;

    /**
     * CreateClubCommand constructor.
     *
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $club
     * @param string $subdomain
     */
    public function __construct($username = null, $email = null, $password = null, $club = null, $subdomain = null)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->club = $club;
        $this->subdomain = $subdomain;
    }

    /**
     * @param InputInterface $input
     *
     * @return CreateClubCommand
     */
    public static function createFromInput(InputInterface $input)
    {
        return new self(
            $input->getArgument('username'),
            $input->getArgument('email'),
            $input->getArgument('password'),
            null,
            $input->getArgument('subdomain')
        );
    }
}
