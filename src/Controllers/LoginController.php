<?php

namespace App\Controllers;


use App\Dto\LoginRequest;
use App\Exception\InvalidCredentialException;
use App\Service\AuthService;
use App\Utils\SessionMessageUtil;

class LoginController
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): void
    {
        try {
            $user = $this->authService->authenticate($request);
            SessionMessageUtil::set("username", $user["name"]);
            SessionMessageUtil::set("userid", $user["id"]);

            header('Location: /admin/dashboard');
            exit();
        } catch (InvalidCredentialException | \Exception $e) {
            SessionMessageUtil::set("error", true);
            SessionMessageUtil::set("message", $e->getMessage());

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
