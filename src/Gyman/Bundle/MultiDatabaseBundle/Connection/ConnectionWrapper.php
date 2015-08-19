<?php

namespace Gyman\Bundle\MultiDatabaseBundle\Connection;

use Doctrine\Common\EventManager;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver;
use Doctrine\DBAL\Event\ConnectionEventArgs;
use Doctrine\DBAL\Events;
use Doctrine\DBAL\Platforms\MySQL57Platform;
use Gyman\Bundle\MultiDatabaseBundle\Exception\CredentialsUnchangedException;
use Gyman\Bundle\MultiDatabaseBundle\Exception\SessionCredentialsNotInitializedException;
use Gyman\Bundle\MultiDatabaseBundle\Services\CredentialsStorage;

class ConnectionWrapper extends Connection
{
    private $platform;

    /**
     * @var CredentialsStorage
     */
    private $credentialsStorage;

    /**
     * @var bool
     */
    private $isConnected = false;

    /**
     * @param CredentialsStorage $credentialsStorage
     */
    public function setCredentialsStorage(CredentialsStorage $credentialsStorage)
    {
        $this->credentialsStorage = $credentialsStorage;
    }

    /**
     * @param array $params
     * @param Driver $driver
     * @param Configuration|null $config
     * @param EventManager|null $eventManager
     */
    public function __construct(
        array $params, Driver $driver, Configuration $config = null, EventManager $eventManager = null
    ) {
        $this->setCredentialsStorage(new CredentialsStorage());
        $this->platform = $params['platform'] = new MySQL57Platform();
        $params['server_version'] = '5.6';
        parent::__construct($params, $driver, $config, $eventManager);
    }

    public function forceSwitch($dbName, $dbUser, $dbPassword)
    {
        try {
            $this->credentialsStorage->updateCredentials($dbName, $dbUser, $dbPassword);
        } catch (CredentialsUnchangedException $e) {
            return;
        }

        if ($this->isConnected()) {
            $this->close();
        }

        $this->connect();
    }

    /**
     * {@inheritDoc}
     */
    public function connect()
    {
        if ($this->isConnected()) {
            return true;
        }

        try {
            $params = $this->credentialsStorage->updateParamsArray($this->getParams());
        } catch (SessionCredentialsNotInitializedException $e) {
            return false;
        }

        $params['server_version'] = '5.6';

        $this->_conn = $this->_driver->connect(
            $params,
            $params[CredentialsStorage::PARAM_USER],
            $params[CredentialsStorage::PARAM_PASS],
            $params['driverOptions']
        );

        if ($this->_eventManager->hasListeners(Events::postConnect)) {
            $eventArgs = new ConnectionEventArgs($this);
            $this->_eventManager->dispatchEvent(Events::postConnect, $eventArgs);
        }

        $this->isConnected = true;

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function isConnected()
    {
        return $this->isConnected;
    }

    /**
     * {@inheritDoc}
     */
    public function close()
    {
        if ($this->isConnected()) {
            parent::close();
            $this->isConnected = false;
        }
    }
}
