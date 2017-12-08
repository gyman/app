<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'mailer.registration_successful' shared service.

$this->services['mailer.registration_successful'] = $instance = new \Gyman\Bundle\MailerBundle\Service\Mailer(${($_ = isset($this->services['swiftmailer.mailer.default']) ? $this->services['swiftmailer.mailer.default'] : $this->load(__DIR__.'/getSwiftmailer_Mailer_DefaultService.php')) && false ?: '_'}, ${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}, ${($_ = isset($this->services['templating']) ? $this->services['templating'] : $this->load(__DIR__.'/getTemplatingService.php')) && false ?: '_'});

$instance->setSubject('mailing.registration_successful.subject');
$instance->setTemplate('MailerBundle:Templates:registeredSuccess.html.twig');

return $instance;
