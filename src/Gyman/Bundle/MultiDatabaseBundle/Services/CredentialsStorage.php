<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Services;

use Gyman\Bundle\MultiDatabaseBundle\Exception\CredentialsUnchangedException;

class CredentialsStorage
{
    const PARAM_BASE = 'dbname';
    const PARAM_USER = 'user';
    const PARAM_PASS = 'password';

    private $credentials = [
        self::PARAM_BASE => null,
        self::PARAM_USER => null,
        self::PARAM_PASS => null,
    ];

    /**
     * @param $dbName
     * @param $dbUser
     * @param $dbPassword
     */
    public function updateCredentials($dbName, $dbUser, $dbPassword)
    {
        if ($this->getDatabaseName() === $dbName) {
            throw new CredentialsUnchangedException();
        }

        $this->setDatabaseName($dbName);
        $this->setUser($dbUser);
        $this->setPassword($dbPassword);
    }

    public function updateParamsArray($parameters)
    {
        $parameters['dbname'] = $this->credentials[self::PARAM_BASE];
        $parameters['user'] = $this->credentials[self::PARAM_USER];
        $parameters['password'] = $this->credentials[self::PARAM_PASS];

        return $parameters;
    }

    /**
     * @param string $dbName
     */
    private function setDatabaseName($dbName)
    {
        $this->credentials[self::PARAM_BASE] = $dbName;
    }

    /**
     * @param string $dbUser
     */
    private function setUser($dbUser)
    {
        $this->credentials[self::PARAM_USER] = $dbUser;
    }

    /**
     * @param string $dbPassword
     */
    private function setPassword($dbPassword)
    {
        $this->credentials[self::PARAM_PASS] = $dbPassword;
    }

    /**
     * @return string
     */
    private function getDatabaseName()
    {
        return $this->credentials[self::PARAM_BASE];
    }
}
