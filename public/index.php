<?php

require __DIR__ . '/../vendor/autoload.php';
$dependencies = require __DIR__ . '/../bootstrap/bootstrap.php';

use App\Console\Kernel;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Http\Request;

// Obtener el enrutador y Blade del contenedor de dependencias
$router = $dependencies['router'];
$blade = $dependencies['blade'];

// Verificar si se está ejecutando en la línea de comandos (CLI) o en un entorno HTTP
if (php_sapi_name() === 'cli') {
    $kernel = new Kernel();

    // CLI command
    $input = new ArgvInput();
    $output = new ConsoleOutput();
    
    // Handle the command
    $kernel->handle($input, $output);
} else {
    // Manejo de solicitudes HTTP
    $request = Request::capture();
    $response = $router->dispatch($request);
    $response->send();
}
