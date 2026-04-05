<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Libraries\ContentLoader;

class Home extends BaseController
{
    protected $helpers = ['url'];

    public function index(): string
    {
        $loader = new ContentLoader();
        $page   = $loader->load();

        return view('home', ['page' => $page]);
    }
}
