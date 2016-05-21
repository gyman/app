<?php
namespace Gyman\Bundle\AppBundle\Listener;

use Gyman\Bundle\AppBundle\Globals;
use Gyman\Bundle\AppBundle\Services\SubdomainProviderInterface;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Routing\Router;
use Twig_Environment;

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
     * @var Twig_Environment
     */
    private $twig;

    /**
     * SubdomainNameListener constructor.
     * @param SubdomainProviderInterface $subdomainProvider
     * @param Container $container
     * @param Twig_Environment $twig
     */
    public function __construct(SubdomainProviderInterface $subdomainProvider, Container $container, Twig_Environment $twig)
    {
        $this->subdomainProvider = $subdomainProvider;
        $this->container = $container;
        $this->twig = $twig;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $subdomainName = $this->subdomainProvider->getSubdomain();

        $club = $this->container->get('doctrine.orm.default_entity_manager')
            ->getRepository('ClubBundle:Club')
            ->findOneBySubdomain($subdomainName);

        if(strlen($subdomainName) > 0 && is_null($club)) {
            $schemaAndHost = strtr($event->getRequest()->getSchemeAndHttpHost(), [$subdomainName."." => ""]);

            $path = $this->container->get("router")->generate(
                "gyman_error_club_not_found",
                ["subdomain" => $subdomainName],
                Router::ABSOLUTE_PATH
            );

            $event->setResponse(new RedirectResponse($schemaAndHost . $path));
            return;
        }

        Globals::setNoImage($this->container->getParameter('no_image'));
        Globals::setGalleryDir($this->container->getParameter('gallerydirectory') . $subdomainName . DIRECTORY_SEPARATOR);
        Globals::setGalleryPath($this->container->getParameter('gallerypath') . $subdomainName . DIRECTORY_SEPARATOR);
        Globals::setSubdomain($subdomainName);

        $this->container->get('session')->set('current_club', $club);
        $this->twig->addGlobal('club', $club);
    }
}
