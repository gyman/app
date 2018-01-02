<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Listener;

use Dende\MultitenancyBundle\Manager\TenantManager;
use Gyman\Bundle\AppBundle\Services\SubdomainProviderInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Class SubdomainNameListener.
 */
class SubdomainNameListener
{
    /**
     * @var SubdomainProviderInterface
     */
    private $subdomainProvider;

    /**
     * @var TenantManager
     */
    private $tenantManager;

    /**
     * SubdomainNameListener constructor.
     *
     * @param SubdomainProviderInterface $subdomainProvider
     * @param TenantManager              $tenantManager
     */
    public function __construct(SubdomainProviderInterface $subdomainProvider, TenantManager $tenantManager)
    {
        $this->subdomainProvider = $subdomainProvider;
        $this->tenantManager = $tenantManager;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) { // @todo: get sure if it's needed
            return;
        }

        $subdomainName = $this->subdomainProvider->getSubdomain();

        if (null === $subdomainName) {
            return;
        }

        $this->tenantManager->switchConnection('tenant', $subdomainName);
    }
}
