<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'fos_user.command.change_password' shared service.

$this->services['fos_user.command.change_password'] = $instance = new \FOS\UserBundle\Command\ChangePasswordCommand();

$instance->setName('fos:user:change-password');

return $instance;
