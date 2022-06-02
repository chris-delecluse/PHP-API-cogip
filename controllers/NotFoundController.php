<?php

 namespace App\Controllers;

 class NotFoundController extends Controller
 {
     public function index()
     {
         require $this->view('notFound');
     }
 }