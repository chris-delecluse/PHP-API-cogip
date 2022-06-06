<?php

namespace App\Controllers;

class HomeController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index(): void
    {
/*        echo $_SERVER['PHP_AUTH_DIGEST'];

        $token = bin2hex(random_bytes(64));

        echo $token;*/

        require $this->view('index');
    }
}
