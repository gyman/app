<?php
namespace Gyman\Bundle\AppBundle\Listener;

use Dende\MultitenancyBundle\Manager\TenantManager;
use Gyman\Bundle\AppBundle\Services\SubdomainProviderInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class SubdomainNameListener
 * @package Gyman\Bundle\AppBundle\Listener
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
     * @var RouterInterface
     */
    private $router;

    public function __construct(SubdomainProviderInterface $subdomainProvider, TenantManager $tenantManager, RouterInterface $router)
    {
        $this->subdomainProvider = $subdomainProvider;
        $this->tenantManager = $tenantManager;
        $this->router = $router;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {

        if (!$event->isMasterRequest()) { // @todo: get sure if it's needed
            return;
        }

        $subdomainName = $this->subdomainProvider->getSubdomain();

        if($subdomainName === null) {
            return;
        }

        $this->router->getContext()->setParameter('_subdomain', $subdomainName);

        $this->tenantManager->switchConnection('tenant', $subdomainName);
    }
}
