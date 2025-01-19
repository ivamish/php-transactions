<?php

namespace vendor\Router;

use vendor\Interfaces\ResponseInterface;
use vendor\Interfaces\RouterInterface;
use vendor\Interfaces\SingletonInterface;
use vendor\Response\Response;
use vendor\Traits\TSingleTone;

class Router implements RouterInterface,SingletonInterface
{
    use TSingleTone;

    public array $routes = [];

    public function setUrl(string $url, array $controller, string $method = 'GET'): bool
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
        $method = $_SERVER['REQUEST_METHOD'];

        if(!array_key_exists($url, $this->routes)){
            throw new \RuntimeException("URL не найден", 404);
        }

        if ($this->routes[$url]['method'] !== $method) {
            throw new \RuntimeException("Метод {$method} не поддерживается", 405);
        }

        $controller = $this->routes[$url]['controller'][0];
        $controller = new $controller();

        return new Response($controller->{$this->routes[$url]['controller'][1]}());
    }

    public static function get(string $url, array $controller) : bool
    {
        return self::getInstance()->setUrl($url, $controller);
    }

    public static function post(string $url, array $controller) : bool
    {
        return self::getInstance()->setUrl($url, $controller, 'POST');
    }
}