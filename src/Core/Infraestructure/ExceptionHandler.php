<?php

namespace App\Core\Infraestructure;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class ExceptionHandler
{
    /**
     * Maneja las excepciones lanzadas por la aplicación.
     *
     * @param Exception $exception
     * @return Response
     */
    public function handle(Exception $exception): Response
    {
        // Verifica si es una excepción de ruta no encontrada (404)
        if ($exception instanceof RouteNotFoundException) {
            return $this->renderNotFound();
        }

        // Si es otra excepción general, muestra un error 500
        return $this->renderInternalError($exception);
    }

    /**
     * Renderiza una página para rutas no encontradas (404).
     *
     * @return Response
     */
    protected function renderNotFound(): Response
    {
        $view = __DIR__ . '/../../resources/views/errors/404.blade.php';
        if (file_exists($view)) {
            return new Response($this->renderView($view), 404);
        }

        return new Response('404 - Página no encontrada', 404);
    }

    /**
     * Renderiza una página de error interno (500).
     *
     * @param Exception $exception
     * @return Response
     */
    protected function renderInternalError(Exception $exception): Response
    {
        if (getenv('APP_ENV') === 'development') {
            return new Response("Error Interno: {$exception->getMessage()}", 500);
        }

        $view = __DIR__ . '/../../resources/views/errors/500.blade.php';
        if (file_exists($view)) {
            return new Response($this->renderView($view), 500);
        }

        return new Response('500 - Error Interno del Servidor', 500);
    }

    /**
     * Renderiza una vista Blade.
     *
     * @param string $view
     * @return string
     */
    protected function renderView(string $view): string
    {
        // Usa Blade o cualquier otro motor de plantillas para renderizar la vista
        $blade = app('blade');
        return $blade->render(basename($view, '.blade.php'), []);
    }
}
