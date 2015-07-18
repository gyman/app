<?php

namespace Gyman\Bundle\MultiDatabaseBundle\Connection;

use Doctrine\DBAL\Connection;
use Exception;
use Gyman\Bundle\MultiDatabaseBundle\Exception\UserHasNoClubsException;
use Gyman\Bundle\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContext;

final class ClubConnection implements ConnectionInterface
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

    public function setSecurityContext(SecurityContext $securityContext)
    {
        $this->securityContext = $securityContext;
    }

/**
     * Sets the DB Name prefix to use when selecting the database to connect to
     *
     * @param  Connection       $connection
     * @return ClubConnection $this
     */
    public function setDoctrineConnection(Connection $connection)
    {
        $this->connection = $connection;

        return $this;
    }

    /**
     * @throws Exception
     */
    public function onKernelRequest()
    {
        if (!$this->securityContext->getToken()) {
            return;
        }

        /** @var User $user */
        $user = $this->securityContext->getToken()->getUser();
        $club = $user->getCurrentClub();

        if (!$club) {
            $club = $user->getClubs()->first();
        }

        if (!$club) {
            throw new UserHasNoClubsException($user);
        }

        $db = $club->getDatabase();

$this->connection->forceSwitch($db['name'], $db['user'], $db['password']);
    }
}
