<?php

namespace App\Core\Infraestructure;

use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ExceptionHandler
{
    /**
     * Maneja las excepciones lanzadas por la aplicación.
     *
     * @param Throwable $exception
     * @return Response
     */
    public function handle(Throwable $exception): Response
    {
        // Verifica si es una excepción de ruta no encontrada (404)
        if ($exception instanceof NotFoundHttpException) {
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
     * @param Throwable $exception
     * @return Response
     */
    protected function renderInternalError(Throwable $exception): Response
    {
        // Muestra detalles del error solo en modo de desarrollo
        if (env('APP_ENV') === 'development') {
            return new Response("Error Interno 500: {$exception->getMessage()}", 500);
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
        // Obtén la instancia de Blade del contenedor
        $blade = app()->make('blade');

        if (!$blade) {
            return 'Blade no está disponible.';
        }

        try {
            // Renderiza la vista usando Blade
            return $blade->render($view);
        } catch (\Exception $e) {
            return 'Error al renderizar la vista: ' . $e->getMessage();
        }
    }
}
