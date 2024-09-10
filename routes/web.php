<?php

use Illuminate\Routing\Router;

// Define rutas
$router->get('/', 'App\Core\Interfaces\Controllers\HomeController@index');

$router->get('/home', function () {
    return 'Bienvenido a Cat Framework!';
});



