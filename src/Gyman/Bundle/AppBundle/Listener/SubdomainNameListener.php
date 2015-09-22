<?php

namespace Gyman\Bundle\AppBundle\Listener;

use Gyman\Bundle\AppBundle\Globals;
use Gyman\Bundle\AppBundle\Services\SubdomainProviderInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

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
     * @var Container
     */
    private $container;

    /**
     * SubdomainNameListener constructor.
     * @param SubdomainProviderInterface $subdomainProvider
     * @param $container
     */
    public function __construct(SubdomainProviderInterface $subdomainProvider, Container $container)
    {
        $this->subdomainProvider = $subdomainProvider;
        $this->container = $container;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $subdomain = $this->subdomainProvider->getSubdomain();

        Globals::setNoImage($this->container->getParameter('no_image'));
        Globals::setGalleryDir($this->container->getParameter('gallerydirectory') . $subdomain . DIRECTORY_SEPARATOR);
        Globals::setGalleryPath($this->container->getParameter('gallerypath') . $subdomain . DIRECTORY_SEPARATOR);
        Globals::setSubdomain($subdomain);
    }
}
