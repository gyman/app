<?php

namespace Gyman\Bundle\MailerBundle\Service;

use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\Translation\TranslatorInterface;
use Swift_Mailer;

class Mailer
{

// <editor-fold defaultstate="collapsed" desc="fields">
    /**
     * @var SwiftMailer
     */
    private $mailer;

    /**
     * @var TwigEngine
     */
    private $templating;

    /**
     * @var Translator
     */
    private $translator;

    /**
     * @var string
     */
    private $template;

    /**
     * @var array
     */
    private $parameters = array();

    /**
     * @return Swift_Message
     */
    private $message;// </editor-fold>
    
// <editor-fold defaultstate="collapsed" desc="setters & getters">

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    public function getMailer()
    {
        return $this->mailer;
    }

    public function getTemplating()
    {
        return $this->templating;
    }

    public function getTranslator()
    {
        return $this->translator;
    }

    public function setMailer(Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
        return $this;
    }

    public function setTemplating(EngineInterface $templating)
    {
        $this->templating = $templating;
        return $this;
    }

    public function setTranslator(TranslatorInterface $translator)
    {
        $this->translator = $translator;
        return $this;
    }// </editor-fold>
    
    public function sendMail()
    {
        $this->updateSubject();
        $this->updateBody();
        
        $this->getMailer()->send(
            $this->getMessage()
        );
    }
    
    private function updateBody()
    {
        $this->getMessage()->setBody(
            $this->getTemplating()->render(
                $this->getTemplate(),
                $this->getParameters()
            )
        );
    }
    
    private function updateSubject()
    {
        $this->getMessage()->setSubject(
            $this->getTranslator()->trans(
                $this->getMessage()->getSubject()
            )
        );
    }
    
    public function __construct(Swift_Mailer $mailer)
    {
        $this->setMailer($mailer);
        $this->setMessage(
            $mailer->createMessage()
        );
        $this->getMessage()->setContentType("text/html");
    }
    
    public function __call($method, $arguments)
    {
        if (strstr($method, "set") && method_exists($this->getMessage(), $method)) {
            return call_user_func_array(
                array($this->getMessage(),$method),
                $arguments
            );
        }
        
        throw new \BadMethodCallException('Method "' . $method . '" does not exist and was not trapped in __call()');
    }
}
