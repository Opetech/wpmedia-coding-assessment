<?php

use App\Commands\CrawlCommand;
use App\Commands\Crawler;
use App\Controllers\CrawlerController;
use App\Service\CrawlInvoker;
use App\Service\DefaultCrawlerService;
use App\Utils\SessionMessageUtil;

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'helpers.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../', '.env');
$dotenv->load();


//TODO
//Prevent non authenticated user from making this request

try {
    $crawler = new Crawler();
    $urlToCrawl = "http://wpmedia-nginx/";
    $crawlCommand = new CrawlCommand($crawler, $urlToCrawl);
    $crawlInvoker = new CrawlInvoker();
    $crawlInvoker->setCommand($crawlCommand);
    $crawlInvoker->run();

    SessionMessageUtil::set("success", true);
    SessionMessageUtil::set("message", "Crawling was successful");

    header('Location: /admin/dashboard');
    exit();
}catch (Exception $e){
    SessionMessageUtil::set("error", true);
    SessionMessageUtil::set("message", $e->getMessage());

    header('Location: /admin/dashboard');
    exit();
}





