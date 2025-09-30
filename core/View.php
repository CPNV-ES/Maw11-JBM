<?php

namespace core;

class View
{
    public function view($viewFile, $data = [] ?? null): false|string
    {
        $view = dirname(__DIR__) . '/app/View/'. $viewFile;

        if (!is_file($view)) {
            http_response_code(500);
            return 'View not found';
        }

        ob_start();
        include $view;
        return ob_get_clean();
    }
}

function  view($file): false|string
{
    return new View()->view($file);
}