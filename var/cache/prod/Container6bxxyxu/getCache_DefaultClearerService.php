<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'cache.default_clearer' shared service.

return $this->services['cache.default_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer(array('cache.app' => ${($_ = isset($this->services['cache.app']) ? $this->services['cache.app'] : $this->load(__DIR__.'/getCache_AppService.php')) && false ?: '_'}));
