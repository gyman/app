<?php

namespace Gyman\Bundle\AccountBundle\Security;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class LogoutHandler
{
    private $sessionLifetime;

    /**
     * @param mixed $sessionLifetime
     */
    public function setSessionLifetime($sessionLifetime)
    {
        $this->sessionLifetime = $sessionLifetime;
    }

    public function execute(GetResponseForExceptionEvent $event)
    {
        $request = $event->getRequest();
        $exception = $event->getException();

        if ($exception instanceof AuthenticationException || $exception instanceof AccessDeniedException) {
            if ($request->isXmlHttpRequest()) {
                $event->setResponse(new JsonResponse(['action' => 'logout'], 401, ['Content-Type' => 'application/json']));
            }
        }
    }
}
