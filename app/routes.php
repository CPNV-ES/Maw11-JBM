<?php

use core\Router;
use Maw11Jbm\Controllers\UserController;

/** @var Router $router */

$router->addRoute('GET', '/users', [UserController::class, 'index']);

$router->addRoute('GET', '/user/{id}', [UserController::class, 'show']);
