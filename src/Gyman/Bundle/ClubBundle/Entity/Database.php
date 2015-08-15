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
     * Database constructor.
     * @param string $dbname
     * @param string $username
     * @param string $password
     */
    public function __construct($dbname, $username, $password)
    {
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->dbname;
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
    public function getPassword()
    {
        return $this->password;
    }
}