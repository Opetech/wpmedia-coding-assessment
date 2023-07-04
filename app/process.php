<?php

use App\Controllers\LoginController;
use App\Dto\LoginRequest;
use App\Service\AuthService;

if (isset($_POST["login"])) {
    $loginRequest    = new LoginRequest($_POST["email"], $_POST["password"]);
    $loginController = new LoginController(new AuthService());
    //process login action
    $loginController->login($loginRequest);
}

if (isset($_POST["logout"])) {
    $loginController = new LoginController(new AuthService());
    $loginController->logout();
}

