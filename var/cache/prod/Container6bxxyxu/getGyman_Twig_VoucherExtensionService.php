<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'gyman.twig.voucher_extension' shared service.

$this->services['gyman.twig.voucher_extension'] = $instance = new \Gyman\Bundle\AppBundle\Twig\VoucherExtension();

$instance->setTranslator(${($_ = isset($this->services['translator.default']) ? $this->services['translator.default'] : $this->getTranslator_DefaultService()) && false ?: '_'});

return $instance;
