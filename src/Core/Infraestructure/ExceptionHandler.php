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
        return new Response($this->renderView('errors/404'), 404);
    }

    /**
     * Renderiza una página de error interno (500).
     *
     * @param Exception $exception
     * @return Response
     */
    protected function renderInternalError(Exception $exception): Response
    {
        // Muestra detalles del error solo en modo de desarrollo
        if (env('APP_ENV') === 'development') {
            return new Response("Error Interno: {$exception->getMessage()}", 500);
        }

        return new Response($this->renderView('errors/500'), 500);
    }

    /**
     * Renderiza una vista Blade.
     *
     * @param string $view
     * @return string
     */
    protected function renderView(string $view): string
    {
        $blade = app('blade');

        try {
            // Verifica la ruta del archivo de vista
            $viewPath = __DIR__ . "/../../../resources/views/{$view}.blade.php";
            if (!file_exists($viewPath)) {
                return "Vista no encontrada: {$viewPath}";
            }

            // Renderiza la vista usando Blade
            return $blade->render($view, []);
        } catch (\Exception $e) {
            return 'Error al renderizar la vista: ' . $e->getMessage();
        }
    }
}
