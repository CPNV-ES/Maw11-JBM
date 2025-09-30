<?php

namespace Maw11Jbm\Controllers;

use core\View;

class HomePageController
{
    public function index(): false|string
    {
        return new View()->view('HomePage.php');
    }
}