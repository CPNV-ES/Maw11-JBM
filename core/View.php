<?php

namespace core;

class View
{
    public function view(string $viewFile, array $data = []): string
    {
        $view = dirname(__DIR__) . '/app/View/'. $viewFile;

        if (!is_file($view)) {
            http_response_code(500);
            return 'View not found';
        }

        if (!empty($data)) {
            extract($data, EXTR_SKIP);
        }

        ob_start();
        include $view;
        return ob_get_clean();
    }
}

function  view(string $file, array $data = []): string
{
    return new View()->view($file, $data);
}