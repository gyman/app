<?php
namespace Gyman\Application\Command;

use Symfony\Component\Console\Input\InputInterface;

class CreateClubCommand
{
    /**
     * Username used for logging in
     * @var string
     */
    private $username;

    /**
     * Email address of user
     * @var string
     */
    private $email;

    /**
     * Password for credentials
     * @var string
     */
    private $password;

    /**
     * Clubs name
     * @var string
     */
    private $club;

    /**
     * Subdomain used for a club tenant
     * @var string
     */
    private $subdomain;

    /**
     * CreateClubCommand constructor.
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $club
     * @param string $subdomain
     */
    public function __construct($username, $email, $password, $club, $subdomain)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->club = $club;
        $this->subdomain = $subdomain;
    }

    /**
     * @param InputInterface $input
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

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @return string
     */
    public function getSubdomain()
    {
        return $this->subdomain;
    }
}