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

    public function __construct(?string $dbname = null, ?string $username = null, ?string $password = null, ?string $host = null)
    {
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->host = $host;
    }

    public function dbname() : ?string
    {
        return $this->dbname;
    }

    public function username() : ?string
    {
        return $this->username;
    }

    public function password() : ?string
    {
        return $this->password;
    }

    public function host(): ?string
    {
        return $this->host;
    }
}
