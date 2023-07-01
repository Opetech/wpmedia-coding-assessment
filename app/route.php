<?php
$request = $_SERVER['REQUEST_URI'];
$viewDir = __DIR__.'/../public/views/';

switch ($request) {
    case '':
    case '/':
        require $viewDir . 'home.php';
        break;

    case '/login':
        require $viewDir . 'login.php';
        break;

    case '/contact':
        require $viewDir . 'contact.php';
        break;

    case '/services':
        require $viewDir . 'services.php';
        break;

    case '/about':
        require $viewDir . 'about.php';
        break;

    case '/admin/dashboard':
        require $viewDir . 'dashboard.php';
        break;

    case '/admin/crawl':
        require __DIR__.'/crawler.php';
        break;

    default:
        http_response_code(404);
}
