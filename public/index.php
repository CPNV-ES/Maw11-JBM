<?php

namespace core;

use Throwable;

const BASE_DIR = __DIR__ . '/..';
const APP_DIR  = BASE_DIR . '/app';

require BASE_DIR . '/vendor/autoload.php';

$db = new Database();

$router = new Router();

include APP_DIR . '/routes.php';

try {
    $output = $router->resolve();
    echo $output;
} catch (Throwable $e) {
    http_response_code(500);

    return view('errors/500.php', ['message' => $e->getMessage()]);
}
