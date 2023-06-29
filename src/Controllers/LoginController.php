<?php

namespace App\Controllers;


use App\Dto\LoginRequest;
use App\Service\AuthService;

class LoginController
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): void
    {
        $this->authService->authenticate($request);
    }
}
