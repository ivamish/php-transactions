<?php

use app\Infastructure\Controllers\MainController;
use vendor\Router\Router;

 Router::get('/', [MainController::class, 'index']);
 Router::get('/get_transaction', [MainController::class, 'get_transaction']);