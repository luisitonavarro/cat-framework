<?php

use Illuminate\Routing\Router;

// Define rutas
$router->get('/', function () {
    return 'Bienvenido a Cat Framework!';
});

$router->get('home', 'App\Core\Interfaces\Controllers\HomeController@index');
