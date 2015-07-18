<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Connection;

use Doctrine\DBAL\Connection;
use Exception;
use Symfony\Component\HttpFoundation\Session\Session;

class ClubConnection
{
    const SESSION_ACTIVE_DYNAMIC_CONN = 'active_dynamic_conn';
        
    /**
     * @var Session
     */
    private $session;

    /**
     * @param Session $sess
     */
    public function setSession(Session $sess)
    {
        $this->session = $sess;
    }
    
    /**
     * @var ConnectionWrapper
     */
    private $connection;
    
    /**
     *
     * @var \Symfony\Component\Security\Core\SecurityContext
     */
    private $securityContext;

    public function getSecurityContext()
    {
        return $this->securityContext;
    }

    public function setSecurityContext(\Symfony\Component\Security\Core\SecurityContext $securityContext)
    {
        $this->securityContext = $securityContext;
    }
    
    /**
     * Sets the DB Name prefix to use when selecting the database to connect to
     *
     * @param  Connection       $connection
     * @return SiteDbConnection $this
     */
    public function setDoctrineConnection(Connection $connection)
    {
        $this->connection = $connection;

        return $this;
    }

    public function onKernelRequest()
    {
        if (!$this->securityContext->getToken()) {
            return;
        }
        
        $user = $this->securityContext->getToken()->getUser();
        $club = $user->getCurrentClub();

        if (!$club) {
            $club = $user->getClubs()->first();
        }

        if (!$club) {
            throw new \Exception("no clubs");
        }

        $db = $club->getDatabase();
        
        $this->connection->forceSwitch($db["name"], $db["user"], $db["password"]);
        
        
//        if ($this->connection->isConnected()) {
//            return true;
//        }
//
//        $this->connection->setSession($this->session);
//
//        $params = $this->connection->getParams();
//        $driverOptions = isset($params['driverOptions']) ? $params['driverOptions'] : array();
//
//        $realParams = $this->session->get(self::SESSION_ACTIVE_DYNAMIC_CONN);
//        $params['dbname'] = $realParams[0];
//        $params['user'] = $realParams[1];
//        $params['password'] = $realParams[2];
//
//        $this->connection->__construct(
//            $params,
//            $this->connection->getDriver(),
//            $this->connection->getConfiguration(),
//            $this->connection->getEventManager()
//        );
//
////        try {
//            $this->connection->connect();
////        } catch (Exception $e) {
////            // log and handle exception
////        }

        
        /**
        if ($this->request->attributes->has('appId')) {
            $connection = $this->connection;
            $params     = $this->connection->getParams();

            // we also check if the current connection needs to be closed based on various things
            // have left that part in for information here
            // $appId changed from that in the connection?
            // if ($connection->isConnected()) {
            //     $connection->close();
            // }

            // Set default DB connection using appId
            //$params['host']   = $someHost;
            $params['dbname'] = 'Acme_App'.$this->request->attributes->get('appId');

            // Set up the parameters for the parent
            $connection->__construct(
                $params, $connection->getDriver(), $connection->getConfiguration(),
                $connection->getEventManager()
            );

            try {
                $connection->connect();
            } catch (Exception $e) {
                // log and handle exception
            }
        }

        return $this;
         * 
         */
    }
}
