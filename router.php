<?php

use vendor\Router\Router;

require_once 'vendor/autoload.php';

if (file_exists(__DIR__ . $_SERVER['REQUEST_URI'])) {
    return false;
}


Router::getInstance()->setUrl('hahaha', ['hahaha', 'hhahahaha']);

$requestUri = $_SERVER['REQUEST_URI'];
$testValue = ltrim($requestUri, '/');


require_once __DIR__ . '/index.php';