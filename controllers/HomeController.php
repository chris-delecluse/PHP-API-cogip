<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index(): void
    {
        require $this->view('index');
    }
}
