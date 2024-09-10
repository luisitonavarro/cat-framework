<?php 

namespace App\Core\Application\Auth;

use App\Core\Domain\Auth\SessionRepositoryInterface;

class SessionService
{
    protected $session;

    public function __construct(SessionRepositoryInterface $session)
    {
        $this->session = $session;
    }

    public function loginUser($user)
    {
        $this->session->put('user', $user);
    }

    public function logoutUser()
    {
        $this->session->flush();
    }

    public function getAuthenticatedUser()
    {
        return $this->session->get('user');
    }
}
