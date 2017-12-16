#!/usr/bin/env php
<?php

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Server;

require __DIR__.'/../../vendor/autoload.php';

$kernel = new AppKernel('prod', false);

$callback = function (ServerRequestInterface $request) use ($kernel) {
    $method = $request->getMethod();
    $headers = $request->getHeaders();
    $content = $request->getBody();
    $post = array();

    if (in_array(strtoupper($method), array('POST', 'PUT', 'DELETE', 'PATCH')) &&
        isset($headers['Content-Type']) && (0 === strpos($headers['Content-Type'], 'application/x-www-form-urlencoded'))
    ) {
        parse_str($content, $post);
    }

    $sfRequest = Symfony\Component\HttpFoundation\Request::createFromGlobals();
    $sfRequest->setMethod($method);
    $sfRequest->headers->replace($headers);
    $sfRequest->server->set('REQUEST_URI', $request->getUri());

    if (isset($headers['Host'])) {
        $sfRequest->server->set('SERVER_NAME', explode(':', $headers['Host'][0])[0]);
    }

    $sfResponse = $kernel->handle($sfRequest);

    $response = new \React\Http\Response(
        $sfResponse->getStatusCode(),
        array_merge($sfResponse->headers->all()),
        $sfResponse->getContent()
    );

    $kernel->terminate($sfRequest, $sfResponse);

    return $response;
};

$loop = React\EventLoop\Factory::create();

$server = new Server($callback);
$socket = new React\Socket\Server(8080, $loop);
$server->listen($socket);

$loop->run();