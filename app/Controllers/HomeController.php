<?php

namespace Maw11Jbm\Controllers;

use function core\view;

class HomeController
{
    public function index(): false|string
    {
        return view('home-page.php');
    }
}
