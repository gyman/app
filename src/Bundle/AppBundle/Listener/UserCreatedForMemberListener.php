<?php
namespace Gyman\Bundle\AppBundle\Listener;

use Gyman\Application\Event\UserForMemberCreated;
use Gyman\Bundle\MailerBundle\Service\Mailer;

class UserCreatedForMemberListener
{
    /** @var  Mailer */
    protected $mailer;

    /**
     * UserCreatedForMemberListener constructor.
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function onUserCreate(UserForMemberCreated $event)
    {
        $user = $event->user();

        $this->mailer->setParameters([
            "token" => $user->invitationToken(),
            "currentPassword" => $event->currentPassword()
        ]);

        $this->mailer->setTo([$user->getEmail() => $user->member()->details()->fullName()]);
        $this->mailer->setSubject("[gyman.pl] Zaproszenie do rejestracji konta.");

        $this->mailer->sendMail();
    }
}
