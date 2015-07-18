<?php
namespace Gyman\Bundle\MultiDatabaseBundle\DataCollector;

use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

class DatabaseConnectionsDataCollector extends DataCollector {

    /**
     * @var Connection $defaultConnection
     */
    private $defaultConnection;

    /**
     * @var Connection $defaultConnection
     */
    private $clubConnection;

    function __construct(Connection $defaultConnection, Connection $clubConnection)
    {
        $this->clubConnection = $clubConnection;
        $this->defaultConnection = $defaultConnection;
    }

    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $this->data["default"] = $this->defaultConnection->getDatabase();

        if ($this->clubConnection->isConnected()) {
            $this->data["club"] = $this->clubConnection->getDatabase();
        } else {
            $this->data["club"] = "disconnected";
        }
    }

    public function getDefault()
    {
        return $this->data["default"];
    }

    public function getClub()
    {
        return $this->data["club"];
    }

    public function getName()
    {
        return 'database_connections';
    }
}