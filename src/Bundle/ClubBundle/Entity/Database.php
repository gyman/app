<?php
namespace Gyman\Bundle\ClubBundle\Entity;

final class Database
{
    /**
     * @var string
     */
    private $dbname;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $host = 'localhost';

    /**
     * Database constructor.
     * @param string $dbname
     * @param string $username
     * @param string $password
     * @param string $host
     */
    public function __construct(string $dbname, string $username, string $password, string $host)
    {
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->dbname;
    }

    /**
     * @return string
     */
    public function getUsername() : string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword() : string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }
}
