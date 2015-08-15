<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Listener;

use Doctrine\ORM\EntityManager;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use Gyman\Bundle\MultiDatabaseBundle\Connection\ConnectionWrapper;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Class DatabaseSwitcher
 * @package Gyman\Bundle\MultiDatabaseBundle
 */
class DatabaseSwitcher
{
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var ConnectionWrapper
     */
    private $clubConnection;

    /**
     * DatabaseSwitcher constructor.
     * @param $baseUrl
     * @param EntityManager $entityManager
     * @param ConnectionWrapper $connectionWrapper
     */
    public function __construct($baseUrl, EntityManager $entityManager, ConnectionWrapper $connectionWrapper)
    {
        $this->baseUrl = $baseUrl;
        $this->entityManager = $entityManager;
        $this->clubConnection = $connectionWrapper;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $currentHost = $event->getRequest()->getHttpHost();
        $subdomain = str_replace('.'.$this->baseUrl, '', $currentHost);

        /** @var Club $club */
        $club = $this->entityManager->getRepository("ClubBundle:Club")->findOneBySubdomain(new Subdomain($subdomain));

        $this->clubConnection->forceSwitch(
            $club->getDatabase()->getName(),
            $club->getDatabase()->getUsername(),
            $club->getDatabase()->getPassword()
        );
    }
}