<?php

namespace App\Controllers;

class Controller
{
    protected function view($view): string
    {
        return "views/" . $view.  ".php";
    }
}