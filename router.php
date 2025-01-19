<?php

require_once 'vendor/autoload.php';

use vendor\Router\Router;

if (file_exists(__DIR__ . $_SERVER['REQUEST_URI'])) {
    return false;
}

Router::getInstance()->setUrl('hahaha', ['hahaha', 'hhahahaha']);

\vendor\Datebase\Db::getInstance();

$requestUri = $_SERVER['REQUEST_URI'];
$testValue = ltrim($requestUri, '/');

echo '123';

//require_once __DIR__ . '/index.php';