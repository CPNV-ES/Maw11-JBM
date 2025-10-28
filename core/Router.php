<?php

namespace core;

class Router
{
    private array $routes = [];

    public function addRoute(string $method, string $path, callable|array $callback): void
    {
        $pattern = preg_replace('/\{([a-zA-Z]+)}/', '(?P<$1>[^/]+)', $path);
        $pattern = "#^$pattern$#";

        $this->routes[$method][$pattern] = $callback;
    }

    public function resolve(Database $db): void
    {
    $method = $_SERVER['REQUEST_METHOD'];
    $path = $_SERVER['REQUEST_URI'] ?? '/';
    $path = explode('?', $path)[0];

    foreach ($this->routes[$method] ?? [] as $pattern => $callback) {
        if (preg_match($pattern, $path, $matches)) {
            $params = array_filter(
                $matches,
                fn($key) => !is_numeric($key),
                ARRAY_FILTER_USE_KEY
            );

            if (is_array($callback)) {
                [$class, $method] = $callback;
                echo new $class()->$method($params);
            }

            echo $callback($params);
        }
    }

    http_response_code(404);
    echo "404 Not Found";
}


}