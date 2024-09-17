<?php

namespace App\Core\Interfaces\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController
{
    public function index()
    {
        $blade = app()->make('blade');
        $title = 'Hello  Cat Framework ᗢ!';
        return $blade->render('welcome', ['title' => $title]);
    }
}
