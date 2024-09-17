<?php

use Illuminate\Routing\Router;

global $router;

// Define rutas
$router->get('/', 'App\Core\Interfaces\Controllers\HomeController@index');

$router->get('/home', function () {
    return 'Bienvenido a Cat Framework!';
});



