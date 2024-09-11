<?php

namespace App\Core\Interfaces\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController
{
    public function index()
    {
        $blade = app()->make('blade'); // Accede a Blade usando el contenedor
        $title = 'Hello from HomeController!';
        return $blade->render('welcome', ['title' => $title]);
    }
}
