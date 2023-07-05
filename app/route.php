<?php

use App\Controllers\AdminController;
use App\Service\AdminService;

$request = $_SERVER['REQUEST_URI'];
$viewDir = __DIR__ . '/../public/views/';

switch($request) {
    case '/':
        if (file_exists($viewDir . 'home.php')) {
            require $viewDir . 'home.php';
        } else if (file_exists($viewDir . 'home.html')) {
            require $viewDir . 'home.html';
        }else{
            http_response_code(404);
        }
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

    case '/sitemap':
        header('Content-Type: application/xml');
        require $viewDir . '/sitemap.html';
        break;

    case '/admin/crawl':
        require __DIR__ . '/../public/crawler.php';
        break;

    case '/admin/crawl/result':
        $adminService = new AdminService();
        $adminController = new AdminController($adminService);
        $crawledLinks = $adminController->getCrawledLinks();
        require $viewDir . 'dashboard.php';
        break;

    default:
        http_response_code(404);
}
