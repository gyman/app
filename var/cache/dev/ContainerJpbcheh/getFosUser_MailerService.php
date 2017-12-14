<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'fos_user.mailer' shared service.

return $this->services['fos_user.mailer'] = new \FOS\UserBundle\Mailer\TwigSwiftMailer(${($_ = isset($this->services['swiftmailer.mailer.default']) ? $this->services['swiftmailer.mailer.default'] : $this->load(__DIR__.'/getSwiftmailer_Mailer_DefaultService.php')) && false ?: '_'}, ${($_ = isset($this->services['router']) ? $this->services['router'] : $this->getRouterService()) && false ?: '_'}, ${($_ = isset($this->services['twig']) ? $this->services['twig'] : $this->getTwigService()) && false ?: '_'}, array('template' => array('confirmation' => 'MailerBundle:Templates:registerConfirmation.html.twig', 'resetting' => 'MailerBundle:Templates:resetting.html.twig'), 'from_email' => array('confirmation' => $this->parameters['fos_user.registration.confirmation.from_email'], 'resetting' => $this->parameters['fos_user.resetting.email.from_email'])));
