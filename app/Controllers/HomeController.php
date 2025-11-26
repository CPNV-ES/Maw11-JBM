<?php

namespace Maw11Jbm\Controllers;

use function core\view;

class HomeController
{
    public static function index(): false|string
    {
        return view('home.php');
    }
}
