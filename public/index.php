<?php

use core\Database;
use core\Router;

const BASE_DIR = __DIR__ . '/..';
const APP_DIR  = BASE_DIR . '/app';

require BASE_DIR . '/vendor/autoload.php';

$db = new Database();

$router = new Router();


include APP_DIR . '/routes.php';

try {
    $db->connect();
    $router->resolve();
} catch (Exception $e) {
    http_response_code(500);

    return 'Internal Server Error: ' . $e->getMessage();
}
