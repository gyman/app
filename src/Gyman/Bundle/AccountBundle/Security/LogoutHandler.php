<?php
namespace Gyman\Bundle\AccountBundle\Security;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

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
                $event->setResponse(new JsonResponse(array("action" => "logout"), 401, array("Content-Type" => "application/json")));
            }
        }
    }
}
