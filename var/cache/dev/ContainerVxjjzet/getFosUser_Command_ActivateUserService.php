<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'fos_user.command.activate_user' shared service.

$this->services['fos_user.command.activate_user'] = $instance = new \FOS\UserBundle\Command\ActivateUserCommand();

$instance->setName('fos:user:activate');

return $instance;
