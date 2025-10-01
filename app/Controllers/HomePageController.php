<?php

namespace Maw11Jbm\Controllers;

use function core\view;

class HomePageController
{
    public function index(): false|string
    {
        return view('home-page');
    }
}
