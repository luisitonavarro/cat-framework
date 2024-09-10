<?php

require __DIR__ . '/../vendor/autoload.php';
$dependencies = require __DIR__ . '/../bootstrap/bootstrap.php';

use Illuminate\Http\Request;

// Obtener el enrutador y Blade del contenedor de dependencias
$router = $dependencies['router'];
$blade = $dependencies['blade'];

// Verificar si se está ejecutando en la línea de comandos (CLI) o en un entorno HTTP
if (php_sapi_name() === 'cli') {
    // Manejo de comandos de consola
    $consoleKernel = new \App\Console\Kernel();
    $consoleKernel->handle();
} else {
    // Manejo de solicitudes HTTP
    $request = Request::capture();
    $response = $router->dispatch($request);
    $response->send();
}
