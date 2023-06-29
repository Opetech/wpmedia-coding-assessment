<?php

require __DIR__.'/../vendor/autoload.php';

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/views/';

switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'home.php';
        break;

    case '/login':
        require __DIR__ . $viewDir . 'login.php';
        break;

    case '/contact':
        require __DIR__ . $viewDir . 'contact.php';
        break;

    case '/services':
        require __DIR__ . $viewDir . 'services.php';
        break;

    case '/about':
        require __DIR__ . $viewDir . 'about.php';
        break;

    default:
        http_response_code(404);
}
