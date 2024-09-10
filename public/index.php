<?php

require __DIR__ . '/../vendor/autoload.php';
$dependencies = require __DIR__ . '/../bootstrap/bootstrap.php';

use Illuminate\Http\Request;

// Obtener el enrutador y Blade del contenedor de dependencias
$router = $dependencies['router'];
$blade = $dependencies['blade'];

// Procesar solicitud
$request = Request::capture();
$response = $router->dispatch($request);
$response->send();
