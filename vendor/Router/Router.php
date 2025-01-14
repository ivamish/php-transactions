<?php

namespace vendor\Router;

use vendor\Interfaces\ResponseInterface;
use vendor\Interfaces\RouterInterface;
use vendor\Interfaces\SingletonInterface;
use vendor\Traits\TSingleTone;

class Router implements RouterInterface,SingletonInterface
{
    use TSingleTone;


    public function setUrl(string $url, array $controller): bool
    {
        // TODO: Implement setUrl() method.
    }

    public function callActionUrl(string $url): ResponseInterface
    {
        // TODO: Implement callActionUrl() method.
    }
}