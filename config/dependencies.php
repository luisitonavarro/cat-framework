<?php

use App\Core\Infrastructure\Auth\SessionRepository;
use App\Core\Application\Auth\SessionService;
use App\Core\Application\LocaleManager;

return [
    'sessionService' => function($container) {
        return new SessionService(new SessionRepository());
    },
    'localeManager' => function () {
        return new LocaleManager();
    },
    // Aquí puedes añadir más dependencias si es necesario
];
