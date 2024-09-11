<?php

use Illuminate\Container\Container;

/**
 * Obtiene una instancia del contenedor de servicios.
 *
 * @return Container
 */
if (!function_exists('app')) {
    function app()
    {
        global $container;
        return $container;
    }
}

/**
 * Función env para aplicativo
 *
 * @return env
 */
if (!function_exists('env')) {
    function env($key, $default = null)
    {
        return $_ENV[$key] ?? $default;
    }
}
