<?php

namespace vendor\Router;

use vendor\Interfaces\ResponseInterface;
use vendor\Interfaces\RouterInterface;
use vendor\Interfaces\SingletonInterface;
use vendor\Traits\TSingleTone;

class Router implements RouterInterface,SingletonInterface
{
    use TSingleTone;

    private array $routes = [];

    public function setUrl(string $url, array $controller, string $method = 'get'): bool
    {
        if(array_key_exists($url, $this->routes)){
            return false;
        }

        $this->routes[$url] = [
            'method' => $method,
            'controller' => $controller
        ];

        return true;
    }

    public function callActionUrl(string $url): ResponseInterface
    {

    }

    public static function get(string $url, array $controller) : bool
    {
        return self::getInstance()->setUrl($url, $controller);
    }

    public static function post(string $url, array $controller) : bool
    {
        return self::getInstance()->setUrl($url, $controller, 'post');
    }
}