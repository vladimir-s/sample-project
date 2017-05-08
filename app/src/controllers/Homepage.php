<?php
declare(strict_types = 1);

namespace Sample\controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class Homepage
{
    protected $response;

    public function __construct(Request $request, Response $response)
    {
        $this->response = $response;
    }

    public function show($vars)
    {
        $this->response->setContent('Hello World 111');
    }
}