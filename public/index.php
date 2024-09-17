<?php

require __DIR__ . '/../vendor/autoload.php';
$dependencies = require __DIR__ . '/../bootstrap/bootstrap.php';

// Inicializar la aplicación
use App\Console\Kernel;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Http\Request;
use App\Core\Infraestructure\ExceptionHandler;

$router = $dependencies['router'];
$blade = $dependencies['blade'];

// Inicializa el manejador de excepciones
$exceptionHandler = new ExceptionHandler();

try {
    if (php_sapi_name() === 'cli') {
        $kernel = new Kernel();
        $input = new ArgvInput();
        $output = new ConsoleOutput();
        $kernel->handle($input, $output);
    } else {
        $request = Request::capture();
        $response = $router->dispatch($request);
        $response->send();
    }
} catch (Exception $exception) {
    // Maneja la excepción usando el ExceptionHandler
    $response = $exceptionHandler->handle($exception);
    $response->send();
}
