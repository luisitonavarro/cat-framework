<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/Helpers/Helpers.php';

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Jenssegers\Blade\Blade;
use App\Core\Infrastructure\ExceptionHandler;
use Dotenv\Dotenv;

// Carga el archivo .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Inicializa el contenedor y el dispatcher (Singleton)
$container = new Container;
$events = new Dispatcher($container);

// Verifica que las rutas a vistas y caché sean correctas
$viewsPath = __DIR__ . '/../resources/views';
$cachePath = __DIR__ . '/../store/cache';

// Inicializa Blade
$blade = new Blade($viewsPath, $cachePath);

// Registrar Blade en el contenedor
// Registrar Blade en el contenedor
$container->singleton('blade', function () use ($blade) {
    return $blade;
});

// Registrar configuraciones y componentes globales
$database = require __DIR__ . '/../src/Database.php';
$router = require __DIR__ . '/../src/Router.php';

// Verifica que $database y $router sean instancias válidas
if ($database instanceof Database) {
    $database->initialize($events, $container);
} else {
    throw new RuntimeException('El archivo Database.php no devolvió una instancia válida de Database.');
}

if ($router instanceof Router) {
    $router = $router->initialize($events);
} else {
    throw new RuntimeException('El archivo Router.php no devolvió una instancia válida de Router.');
}

// Cargar dependencias desde config/dependencies.php
$dependencies = require __DIR__ . '/../config/dependencies.php';

// Registrar cada dependencia en el contenedor
foreach ($dependencies as $key => $dependency) {
    $container->singleton($key, $dependency);
}

// Cargar rutas de la aplicación
require __DIR__ . '/../routes/web.php';

// Manejador de excepciones
$exceptionHandler = new App\Core\Infraestructure\ExceptionHandler();

set_exception_handler(function ($exception) use ($exceptionHandler) {
    $response = $exceptionHandler->handle($exception);
    $response->send();
    exit; // Asegúrate de detener la ejecución después de enviar la respuesta
});

// Devolver el contenedor, el router y Blade
return compact('router', 'blade', 'container');
