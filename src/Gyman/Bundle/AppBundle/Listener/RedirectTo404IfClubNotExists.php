<?php
namespace Gyman\Bundle\AppBundle\Listener;

use Dende\MultitenancyBundle\Exception\TenantNotFoundException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\Routing\Router;

class RedirectTo404IfClubNotExists
{
    /**
     * @var Router
     */
    private $router;

    /**
     * RedirectTo404IfClubNotExists constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function onException(GetResponseForExceptionEvent $event)
    {
        /** @var TenantNotFoundException $exception */
        $exception = $event->getException();
        $subdomainName = $exception->getTenantId();

        $schemaAndHost = strtr($event->getRequest()->getSchemeAndHttpHost(), [$subdomainName . "." => ""]);

        $path = $this->router->generate(
            "gyman_error_club_not_found",
            ["subdomain" => $subdomainName],
            Router::ABSOLUTE_PATH
        );

        $event->setResponse(new RedirectResponse($schemaAndHost . $path));
        return;
    }
}