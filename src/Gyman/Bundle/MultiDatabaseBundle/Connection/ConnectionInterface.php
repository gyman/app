<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Connection;

use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Interface ConnectionInterface
 * @package Gyman\Bundle\MultiDatabaseBundle\Connection
 */
interface ConnectionInterface
{
    /**
     * @param Session $session
     */
    public function setSession(Session $session);

    /**
     * @return SecurityContext
     */
    public function getSecurityContext();

    /**
     * @param SecurityContext $securityContext
     * @return mixed
     */
    public function setSecurityContext(SecurityContext $securityContext);

    /**
     * Sets the DB Name prefix to use when selecting the database to connect to
     * @param  Connection       $connection
     */
    public function setDoctrineConnection(Connection $connection);

    /**
     * @return null
     */
    public function onKernelRequest();
}
