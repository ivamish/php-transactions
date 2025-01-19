<?php

require_once 'vendor/autoload.php';
require_once 'vendor/helpers.php';
require_once 'app/Infastructure/Routes/web.php';

use vendor\Router\Router;

if (file_exists(__DIR__ . $_SERVER['REQUEST_URI'])) {
    return false;
}

echo '12';

$requestUri = $_SERVER['REQUEST_URI'];
$response = Router::getInstance()->callActionUrl($requestUri);

echo $response->getBody();