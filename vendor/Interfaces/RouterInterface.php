<?php

namespace vendor\Interfaces;

interface RouterInterface {
    public function setUrl(string $url, array $controller) : bool;
    public function callActionUrl(string $url) : ResponseInterface;
}