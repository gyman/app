<?php
namespace Gyman\Bundle\DefaultBundle\Connection;

use Doctrine\Common\EventManager;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver;
use Doctrine\DBAL\Platforms\MySQL57Platform;
use Gyman\Bundle\DefaultBundle\Exception\CredentialsUnchangedException;
use Gyman\Bundle\DefaultBundle\Exception\SessionCredentialsNotInitializedException;
use Gyman\Bundle\DefaultBundle\Services\CredentialsStorage;
use Doctrine\DBAL\Events;
use Doctrine\DBAL\Event\ConnectionEventArgs;

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
    private $_isConnected = false;

    /**
     * @param CredentialsStorage $credentialsStorage
     */
    public function setCredentialsStorage(CredentialsStorage$credentialsStorage)
    {
        $this->credentialsStorage = $credentialsStorage;
    }

    public function __construct(
        array $params, Driver $driver, Configuration $config = null, EventManager $eventManager = null
    )
    {
        $this->platform = $params["platform"] = new MySQL57Platform();
        parent::__construct($params, $driver, $config, $eventManager);
    }

    public function forceSwitch($dbName, $dbUser, $dbPassword)
    {
        try {
            $this->credentialsStorage->updateCredentials($dbName, $dbUser, $dbPassword);
        } catch(CredentialsUnchangedException $e) {
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

        $this->_conn = $this->_driver->connect(
            $params,
            $params[CredentialsStorage::PARAM_USER],
            $params[CredentialsStorage::PARAM_PASS],
            [] // driver options (empty)
        );

        if ($this->_eventManager->hasListeners(Events::postConnect)) {
            $eventArgs = new ConnectionEventArgs($this);
            $this->_eventManager->dispatchEvent(Events::postConnect, $eventArgs);
        }

        $this->_isConnected = true;

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function isConnected()
    {
        return $this->_isConnected;
    }

    /**
     * {@inheritDoc}
     */
    public function close()
    {
        if ($this->isConnected()) {
            parent::close();
            $this->_isConnected = false;
        }
    }
}