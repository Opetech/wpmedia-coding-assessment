<?php
session_start();

use App\Commands\CrawlCommand;
use App\Commands\Crawler;
use App\Service\CrawlInvoker;
use App\Utils\SessionMessageUtil;

require_once __DIR__ . '/../app/helpers.php';
require_once __DIR__ . '/../public/index.php';

$isWebRequest = isset($_SERVER['HTTP_HOST']);

if($isWebRequest && !isLoggedIn()){
    header('Location: /login');
    exit();
}

try {
    $crawler      = new Crawler();
    $urlToCrawl   = "http://wpmedia-nginx/";
    $crawlCommand = new CrawlCommand($crawler, $urlToCrawl);
    $crawlInvoker = new CrawlInvoker();
    $crawlInvoker->setCommand($crawlCommand);
    $crawlInvoker->run();

    SessionMessageUtil::set("success", true);
    SessionMessageUtil::set("message", "Crawling was successful");
} catch (Exception $e) {
    SessionMessageUtil::set("error", true);
    SessionMessageUtil::set("message", $e->getMessage());
}
//Since we are expecting cron job request, we only want to send a redirect response for web request.
if ($isWebRequest) {
    header('Location: /admin/dashboard');
    exit();
}






