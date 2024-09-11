<?php

namespace App\Core\Application;

class LocaleManager
{
    protected $locale;

    public function __construct()
    {
        // Usa la variable de entorno DEFAULT_LANG o 'en' como predeterminado
        $this->locale = env('DEFAULT_LANG', 'en');
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setLocale($locale)
    {
        // Aquí puedes agregar validaciones para los locales soportados
        $this->locale = $locale;
    }
}
