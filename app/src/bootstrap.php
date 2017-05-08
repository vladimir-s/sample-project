<?php
declare(strict_types = 1);

namespace Sample;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

require __DIR__ . '/../vendor/autoload.php';

$injector = require 'dependencies.php';

$request = $injector->make('Symfony\Component\HttpFoundation\Request');
$response = $injector->make('Symfony\Component\HttpFoundation\Response');

$dispatcher = simpleDispatcher(function(RouteCollector $r) {
    $routes = include('routes.php');
    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
});

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getRequestUri());

// http://sample-project/index.php?r=/another-route
// $routeInfo = $dispatcher->dispatch($request->getMethod(), $request->query->get('r'));

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        $response->setContent('404 - Page not found');
        $response->setStatusCode(404);
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $response->setContent('405 - Method not allowed');
        $response->setStatusCode(405);
        break;
    case Dispatcher::FOUND:
        $className = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];
        $class = $injector->make($className);
        $class->$method($vars);
        break;
}

$response->prepare($request);
//echo round((memory_get_usage() / 1024), 2).'; ';
$response->send();
