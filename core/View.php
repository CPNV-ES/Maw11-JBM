<?php

namespace core;

class View
{
    public function view(string $pathFile, array $data = []): string
    {
        $view = dirname(__DIR__) . '/app/View/'. $pathFile;

        if (!empty($data)) {
            extract($data, EXTR_SKIP);
        }

        ob_start();
        include $view;
        return ob_get_clean();
    }
}

function  view(string $pathFile, array $data = []): string
{
    return new View()->view($pathFile, $data);
}