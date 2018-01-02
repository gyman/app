<?php

declare(strict_types=1);

namespace Gyman\Bundle\MailerBundle\Service;

use Swift_Mailer;
use Swift_Message;
use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class Mailer.
 *
 * @method void setSubject(string $subject)
 * @method void setTo(array $emails)
 */
class Mailer
{
    /**
     * @var Swift_Mailer
     */
    private $mailer;

    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @var string
     */
    private $template;

    /**
     * @var array
     */
    private $parameters = [];

    /** @var Swift_Message */
    private $message;

    public function __construct(Swift_Mailer $mailer, TranslatorInterface $translator, EngineInterface $templating)
    {
        $this->mailer = $mailer;
        $this->translator = $translator;
        $this->templating = $templating;

        $this->message = $mailer->createMessage();
        $this->message->setContentType('text/html');
    }

    public function __call($method, $arguments)
    {
        if (strstr($method, 'set') && method_exists($this->message, $method)) {
            return call_user_func_array(
                [$this->message, $method],
                $arguments
            );
        }

        throw new \BadMethodCallException('Method "' . $method . '" does not exist and was not trapped in __call()');
    }

    /**
     * @param array $parameters
     */
    public function setParameters($parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function sendMail()
    {
        $this->updateSubject();
        $this->updateBody();

        $this->mailer->send($this->message);
    }

    private function updateBody()
    {
        $this->message->setBody(
            $this->templating->render(
                $this->template,
                $this->parameters
            )
        );
    }

    private function updateSubject()
    {
        $this->message->setSubject(
            $this->translator->trans(
                $this->message->getSubject()
            )
        );
    }
}
