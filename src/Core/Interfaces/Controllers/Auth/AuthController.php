<?php

namespace App\Core\Interfaces\Controllers\Auth;

use App\Core\Application\Auth\SessionService;
use App\Http\Request;

class AuthController
{
    protected $sessionService;

    public function __construct(SessionService $sessionService)
    {
        $this->sessionService = $sessionService;
    }

    public function login(Request $request)
    {
        // Validar el usuario
        $user = $this->authenticate($request->input('email'), $request->input('password'));

        if ($user) {
            // Iniciar sesión
            $this->sessionService->loginUser($user);
            return redirect('dashboard');
        } else {
            return 'Credenciales inválidas';
        }
    }

    public function logout()
    {
        $this->sessionService->logoutUser();
        return redirect('login');
    }

    protected function authenticate($email, $password)
    {
        // Aquí iría la lógica de autenticación
        // Retornar un usuario falso por ahora
        if ($email === 'admin@example.com' && $password === 'secret') {
            return ['email' => $email];
        }

        return null;
    }
}
