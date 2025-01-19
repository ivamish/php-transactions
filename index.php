<?php

require_once 'vendor/autoload.php';
require_once 'vendor/helpers.php';
require_once 'app/Infastructure/Routes/web.php';

use vendor\Router\Router;

$requestUri = $_SERVER['REQUEST_URI'];
$response = Router::getInstance()->callActionUrl($requestUri);

echo $response->getBody();