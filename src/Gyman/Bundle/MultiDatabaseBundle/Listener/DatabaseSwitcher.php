<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Listener;

use Doctrine\ORM\EntityManager;
use Gyman\Bundle\AppBundle\Services\SubdomainProvider;
use Gyman\Bundle\AppBundle\Services\SubdomainProviderInterface;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use Gyman\Bundle\MultiDatabaseBundle\Connection\ConnectionWrapper;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class DatabaseSwitcher
 * @package Gyman\Bundle\MultiDatabaseBundle
 */
class DatabaseSwitcher
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var ConnectionWrapper
     */
    private $clubConnection;

    /**
     * @var SubdomainProvider
     */
    private $subdomainProvider;

    /**
     * DatabaseSwitcher constructor.
     * @param SubdomainProviderInterface $provider
     * @param EntityManager $entityManager
     * @param ConnectionWrapper $connectionWrapper
     * @internal param $baseUrl
     */
    public function __construct(SubdomainProviderInterface $provider, EntityManager $entityManager, ConnectionWrapper $connectionWrapper)
    {
        $this->subdomainProvider = $provider;
        $this->entityManager = $entityManager;
        $this->clubConnection = $connectionWrapper;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $subdomain = $this->subdomainProvider->getSubdomain();

        /** @var Club $club */
        $club = $this->entityManager->getRepository('ClubBundle:Club')->findOneBySubdomain(new Subdomain($subdomain));

        if (!$club) {
            throw new NotFoundHttpException(sprintf('Subdomain "%s" not found or club not registered.', $subdomain));
        }

        $this->clubConnection->forceSwitch(
            $club->getDatabase()->getName(),
            $club->getDatabase()->getUsername(),
            $club->getDatabase()->getPassword()
        );
    }
}
