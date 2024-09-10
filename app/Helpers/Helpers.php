<?php

use Illuminate\Container\Container;

/**
 * Obtiene una instancia del contenedor de servicios.
 *
 * @return Container
 */
function app()
{
    global $container;
    return $container;
}
