<?php

namespace core;

class View
{
    public function view(string $pathFile, array $data = []): string
    {
        $view = dirname(__DIR__) . '/app/View/'. $pathFile;
        $layoutPath = APP_DIR . '/View/layout.php';

        if (!empty($data)) {
            extract($data, EXTR_SKIP);
        }
        ob_start();
        include $view;
        $content = ob_get_clean();

        ob_start();
        include $layoutPath;
        return ob_get_clean();
    }
}

function  view(string $pathFile, array $data = []): string
{
    return new View()->view($pathFile, $data);
}