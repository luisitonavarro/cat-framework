<?php

use Illuminate\Routing\Router as IlluminateRouter;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class Router
{
    protected $router;

    public function __construct()
    {
        // Inicializa el router con Dispatcher y Container de Illuminate
        $this->router = new IlluminateRouter(new Dispatcher(new Container));
    }

    /**
     * Inicializa el router con eventos
     *
     * @param Dispatcher $events
     * @return IlluminateRouter
     */
    public function initialize(Dispatcher $events)
    {
        // Aquí podrías agregar configuración de eventos si es necesario
        return $this->router;
    }

    /**
     * Define una ruta GET
     *
     * @param string $uri
     * @param callable|string $action
     */
    public function get($uri, $action)
    {
        $this->router->get($uri, $action);
    }

    /**
     * Define una ruta POST
     *
     * @param string $uri
     * @param callable|string $action
     */
    public function post($uri, $action)
    {
        $this->router->post($uri, $action);
    }

    /**
     * Define una ruta para cualquier verbo HTTP
     *
     * @param string $uri
     * @param callable|string $action
     */
    public function any($uri, $action)
    {
        $this->router->any($uri, $action);
    }

    /**
     * Ejecuta la resolución de rutas para la solicitud actual
     *
     * @throws RouteNotFoundException
     */
    public function run()
    {
        // Intenta resolver la solicitud HTTP actual
        try {
            $request = Illuminate\Http\Request::capture();
            $response = $this->router->dispatch($request);

            // Envía la respuesta al cliente
            $response->send();
        } catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
            // Si no se encuentra la ruta, lanza una excepción 404
            throw new RouteNotFoundException('Ruta no encontrada.');
        } catch (\Exception $e) {
            // Lanza otras excepciones para ser manejadas por el ExceptionHandler
            throw $e;
        }
    }
}

// Asegúrate de que el archivo devuelva una instancia de la clase Router
return new Router();
