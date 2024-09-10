<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database
{
    protected $capsule;

    public function __construct()
    {
        $this->capsule = new Capsule;
    }

    public function initialize(Dispatcher $events, Container $container)
    {
        $this->capsule->addConnection(require __DIR__ . '/../config/database.php');
        $this->capsule->setEventDispatcher($events);
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
    }
}

// Asegúrate de que el archivo devuelva una instancia de la clase
return new Database();
