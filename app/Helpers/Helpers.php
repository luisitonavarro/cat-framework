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

if (!function_exists('config')) {
    /**
     * Obtener un valor de configuración.
     *
     * @param string $key La clave de la configuración (e.g., 'app.use_mix')
     * @param mixed $default Valor por defecto si la clave no existe.
     * @return mixed
     */
    function config($key, $default = null)
    {
        // Obtener el contenedor
        $container = app();

        // Obtener la configuración registrada en el contenedor
        $config = $container->get('config');

        // Explode la clave para buscar en un array multidimensional
        $keys = explode('.', $key);

        // Buscar el valor en la configuración
        $value = $config;
        foreach ($keys as $keyPart) {
            if (isset($value[$keyPart])) {
                $value = $value[$keyPart];
            } else {
                // Si no existe, retorna el valor por defecto
                return $default;
            }
        }

        return $value;
    }
}

if (!function_exists('asset')) {
    /**
     * Genera una URL completa para un archivo de activos.
     *
     * @param string $path La ruta del archivo (e.g., 'css/style.css')
     * @return string La URL completa del archivo.
     */
    function asset($path)
    {
        // Asegúrate de que la ruta esté correctamente formateada
        $baseUrl = env('APP_URL', 'http://localhost');
        return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
    }
}

if (!function_exists('url')) {
    /**
     * Genera una URL completa para un archivo de activos.
     *
     * @param string $path La ruta del archivo (e.g., 'css/style.css')
     * @return string La URL completa del archivo.
     */
    function url($path)
    {
        // Asegúrate de que la ruta esté correctamente formateada
        $baseUrl = env('APP_URL', 'http://localhost');
        return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
    }
}

if (!function_exists('mix')) {
    /**
     * Genera una URL para un archivo versiónado por Laravel Mix.
     *
     * @param string $path La ruta del archivo versiónado (e.g., 'js/app.js')
     * @return string La URL completa del archivo versiónado.
     */
    function mix($path)
    {
        // Ruta del archivo de manifiesto generado por Laravel Mix
        $manifestPath = __DIR__ . '/../public/mix-manifest.json';

        if (!file_exists($manifestPath)) {
            return asset($path); // Si no existe el manifiesto, devuelve la ruta original
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);

        return isset($manifest[$path]) ? asset(ltrim($manifest[$path], '/')) : asset($path);
    }
}
