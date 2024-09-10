<?php

use App\Core\Infrastructure\Auth\SessionRepository;
use App\Core\Application\Auth\SessionService;

return [
    'sessionService' => function($container) {
        return new SessionService(new SessionRepository());
    },
    // Aquí puedes añadir más dependencias si es necesario
];
