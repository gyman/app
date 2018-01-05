<?php
namespace Gyman\Bundle\SettingsBundle\Subscriber;

use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Gyman\Bundle\MailerBundle\Service\Mailer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Router;

class RegisteredUserSubscriber implements EventSubscriberInterface
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
     * @var Mailer $mailer
     */
    private $mailer;

    /**
     *
     * @return type
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     *
     * @param  \Symfony\Component\Routing\Router                                       $router
     * @return \Gyman\Bundle\SettingsBundle\Service\Subscriber\RegisteredUserSubscriber
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

    public function getMailer()
    {
        return $this->mailer;
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationCompleted',
        ];
    }

    public function onRegistrationCompleted(FormEvent $event)
    {
        $this->setRedirect($event);
        $this->setFlash();
        $this->sendEmail($event);
    }

    private function sendEmail(FormEvent $event)
    {
        $form = $event->getForm();

        $mailer = $this->getMailer();

        $mailer->setParameters([
            'password'   => $form->get('plainPassword')->getData(),
            'username'   => $form->get('username')->getData(),
        ]);
        $mailer->setTo(
            $form->get('email')->getData()
        );
        $mailer->setFrom('uirapuruadg@gmail.com');
        $mailer->sendMail();
    }

    private function setFlash()
    {
        $this->session->getFlashBag()->add(
            'notice',
            'user.notice.profile_registered_succesfuly'
        );
    }

    private function setRedirect(FormEvent $event)
    {
        $url = $this->router->generate('profile_edit');
        $event->setResponse(new RedirectResponse($url));
    }
}
