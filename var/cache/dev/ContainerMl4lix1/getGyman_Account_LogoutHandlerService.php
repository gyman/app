<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'gyman.account.logout_handler' shared service.

$this->services['gyman.account.logout_handler'] = $instance = new \Gyman\Bundle\AccountBundle\Security\LogoutHandler(${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()) && false ?: '_'});

$instance->setSessionLifetime(86400);

return $instance;
