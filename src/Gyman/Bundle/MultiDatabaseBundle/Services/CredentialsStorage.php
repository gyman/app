<?php

namespace Gyman\Bundle\MultiDatabaseBundle\Services;

use Gyman\Bundle\MultiDatabaseBundle\Exception\CredentialsUnchangedException;
use Gyman\Bundle\MultiDatabaseBundle\Exception\SessionCredentialsNotInitializedException;
use Symfony\Component\HttpFoundation\Session\Session;

class CredentialsStorage
{
    const SESSION_ACTIVE_DYNAMIC_CONN = 'active_dynamic_conn';

    const PARAM_BASE = 'dbname';
    const PARAM_USER = 'user';
    const PARAM_PASS = 'password';

    private $credentials = [
        self::PARAM_BASE => null,
        self::PARAM_USER => null,
        self::PARAM_PASS => null,
    ];

    /**
     * @var Session
     */
    private $session;

    /**
     * @return Session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param Session $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

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

        $this->saveStorage();
    }

    public function updateParamsArray($parameters)
    {
        $this->loadStorage();

        $parameters['dbname'] = $this->credentials[self::PARAM_BASE];
        $parameters['user'] = $this->credentials[self::PARAM_USER];
        $parameters['password'] = $this->credentials[self::PARAM_PASS];
        $parameters['server_version'] = "5.6";
        $parameters['serverVersion'] = "5.6";

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

    private function saveStorage()
    {
        $this->session->set(
            self::SESSION_ACTIVE_DYNAMIC_CONN,
            $this->credentials
        );
    }

    private function loadStorage()
    {
        if ($this->session !== null) {
            if (!$this->session->has(self::SESSION_ACTIVE_DYNAMIC_CONN)) {
                throw new SessionCredentialsNotInitializedException();
            }
        }

        $this->credentials = $this->session->get(self::SESSION_ACTIVE_DYNAMIC_CONN);
    }
}
