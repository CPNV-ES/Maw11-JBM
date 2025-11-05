<?php

namespace Maw11Jbm\Controllers;

use function core\view;

class HomeController
{
    static public function index(): false|string
    {
        return view('home.php');
    }
}
