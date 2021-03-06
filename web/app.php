<?php
use Symfony\Component\HttpFoundation\Request;

$loader = require __DIR__.'/../app/autoload.php';
if (PHP_VERSION_ID < 70000) {
    include_once __DIR__.'/../app/bootstrap.php.cache';
}

require_once __DIR__.'/../app/AppKernel.php';
require_once __DIR__.'/../app/AppCache.php';

$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
