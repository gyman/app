<?php

namespace Gyman\Bundle\AccountBundle\Service\Subscriber;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\Session\Session;

class UpdatedProfileSubscriber implements EventSubscriberInterface
{

    /**
     * @var Router $router
     */
    private $router;

    /**
     * @var Session $session
     */
    private $session;

    /**
     * @return Router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param \Symfony\Component\Routing\Router $router
     * @return \Gyman\Bundle\AccountBundle\Service\Subscriber\RegisteredUserSubscriber
     */
    public function setRouter(Router $router)
    {
        $this->router = $router;
        return $this;
    }

    public function getSession()
    {
        return $this->session;
    }

    public function setSession(Session $session)
    {
        $this->session = $session;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::PROFILE_EDIT_COMPLETED  => 'onProfileEditCompleted',
            FOSUserEvents::PROFILE_EDIT_SUCCESS    => 'onProfileEditSuccess',
//            FOSUserEvents::CHANGE_PASSWORD_COMPLETED => 'onResettingCompleted',
//            FOSUserEvents::CHANGE_PASSWORD_SUCCESS => 'onRessetingSuccess',
            FOSUserEvents::RESETTING_RESET_SUCCESS => 'onRessetingSuccess',
        );
    }

    public function onProfileEditSuccess(FormEvent $event)
    {
        $this->setFlash(
            'notice',
            'user.notice.profile_updated_succesfuly'
        );
    }

    public function onProfileEditCompleted(FilterUserResponseEvent $event)
    {
        $this->redirectToDashboard($event);
    }

    public function onRessetingSuccess(FormEvent $event)
    {
        $this->setFlash(
            'notice',
            'user.notice.password_resetted_succesfuly'
        );
        $this->redirectToDashboard($event);
    }

    private function redirectToDashboard($event)
    {
        $url = $this->router->generate('profile_edit');

        if ($event instanceof FilterUserResponseEvent) {
            $event->getResponse()->setTargetUrl($url);
        } elseif ($event instanceof FormEvent) {
            $event->setResponse(new RedirectResponse($url));
        }
    }

    private function setFlash($type, $message)
    {
        $this->session->getFlashBag()->add($type, $message);
    }
}
