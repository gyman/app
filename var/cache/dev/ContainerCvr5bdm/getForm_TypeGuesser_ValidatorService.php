<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'form.type_guesser.validator' shared service.

return $this->services['form.type_guesser.validator'] = new \Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser(${($_ = isset($this->services['liip_functional_test.validator']) ? $this->services['liip_functional_test.validator'] : $this->getLiipFunctionalTest_ValidatorService()) && false ?: '_'});
