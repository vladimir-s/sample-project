<?php
declare(strict_types = 1);

namespace Sample;

use Auryn\Injector;

$injector = new Injector();

//$request = Request::createFromGlobals();
$injector->delegate('Symfony\Component\HttpFoundation\Request', 'Symfony\Component\HttpFoundation\Request::createFromGlobals');
$injector->share('Symfony\Component\HttpFoundation\Request');

//$response = Response::create();
$injector->delegate('Symfony\Component\HttpFoundation\Response', 'Symfony\Component\HttpFoundation\Response::create');
$injector->share('Symfony\Component\HttpFoundation\Response');

//$injector->alias('Http\Request', 'Http\HttpRequest');
//$injector->share('Http\HttpRequest');
//$injector->define('Http\HttpRequest', [
//    ':get' => $_GET,
//    ':post' => $_POST,
//    ':cookies' => $_COOKIE,
//    ':files' => $_FILES,
//    ':server' => $_SERVER,
//]);
//
//$injector->alias('Http\Response', 'Http\HttpResponse');
//$injector->share('Http\HttpResponse');

return $injector;