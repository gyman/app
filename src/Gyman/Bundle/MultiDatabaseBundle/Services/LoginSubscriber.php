<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Services;

use FOS\UserBundle\Event\UserEvent;
use FOS\UserBundle\FOSUserEvents;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\DefaultBundle\Connection\ConnectionWrapper;
use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Gyman\Bundle\UserBundle\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\SecurityEvents;

class LoginSubscriber implements EventSubscriberInterface
{
    /**
     * @var Session
     */
    private $session;

    /**
     * @var ConnectionWrapper
     */
    private $clubConnection;

    /**
     * @param ConnectionWrapper $connection
     */
    public function setClubConnection(ConnectionWrapper $connection)
    {
        $this->clubConnection = $connection;
    }

    /**
     * @param Session $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::SECURITY_IMPLICIT_LOGIN => 'onSecurityImplicitLogin',
            SecurityEvents::INTERACTIVE_LOGIN => 'onSecurityInteractiveLogin',
        );
    }

    public function onSecurityImplicitLogin(UserEvent $event)
    {
        $user = $event->getUser();

        $this->processUser($user);
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $user = $event->getAuthenticationToken()->getUser();
        $this->processUser($user);
    }

    private function processUser(User $user)
    {
        $club = $user->getCurrentClub();

        $db = $this->getDatabaseParameters($club);
        $this->session->set(Globals::CURRENT_CLUB_SESSION_KEY, $club);
        $this->updateConnection($db);
    }

    private function updateConnection(array $db)
    {
        $this->clubConnection->forceSwitch(
            $db[CredentialsStorage::PARAM_BASE],
            $db[CredentialsStorage::PARAM_USER],
            $db[CredentialsStorage::PARAM_PASS]
        );
    }

    private function getDatabaseParameters(Club $club)
    {
        $db = $club->getDatabase();
        return $db;
    }
}
