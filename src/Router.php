<?php

use Illuminate\Routing\Router as IlluminateRouter;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Router
{
    protected $router;

    public function __construct()
    {
        $this->router = new IlluminateRouter(new Dispatcher(new Container));
    }

    public function initialize(Dispatcher $events)
    {
        // Configura el router aquí si es necesario
        return $this->router;
    }
}

// Asegúrate de que el archivo devuelva una instancia de la clase
return new Router();
