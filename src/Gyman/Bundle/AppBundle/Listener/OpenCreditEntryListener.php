<?php
namespace Gyman\Bundle\AppBundle\Listener;

use Gyman\Application\Event\EntryEvent;
use Gyman\Bundle\MailerBundle\Service\Mailer;
use Gyman\Domain\Entry;

class OpenCreditEntryListener
{
    /** @var  Mailer */
    private $mailer;

    /**
     * OpenEntryListener constructor.
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param EntryEvent $event
     */
    public function onSuccess(EntryEvent $event)
    {
        $entry = $event->getEntry();
        
        $email = $entry->member()->email();
        $fullname = $entry->member()->details()->fullName();

        if($email->isInternal() || is_null($email->email())) {
            return;
        }

        $this->mailer->setParameters([
            "entry" => $entry
        ]);

        $this->mailer->setTo([(string) $email => $fullname]);
        $this->mailer->setSubject("[gyman.pl] Wejście na zajęcia!");
        $this->mailer->sendMail();
    }
}