<?php
namespace Gyman\Bundle\AccountBundle\Security;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class LogoutHandler
{
    private $sessionLifetime;

    /** @var  RequestStack */
    private $requestStack;

    /**
     * LogoutHandler constructor.
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @param mixed $sessionLifetime
     */
    public function setSessionLifetime($sessionLifetime)
    {
        $this->sessionLifetime = $sessionLifetime;
    }

    public function execute(GetResponseForExceptionEvent $event)
    {
        $request = $this->requestStack->getMasterRequest();
        $exception = $event->getException();

        if ($exception instanceof AuthenticationException || $exception instanceof AccessDeniedException) {
            if ($request->isXmlHttpRequest()) {
                $event->setResponse(new JsonResponse(['action' => 'logout'], 401, ['Content-Type' => 'application/json']));
            }
        }
    }
}
