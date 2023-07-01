<?php

use App\Controllers\CrawlerController;
use App\Service\DefaultCrawlerService;

require_once 'helpers.php';

//TODO
//Prevent non authenticated user from making this request

$crawlerController = new CrawlerController(new DefaultCrawlerService());
$crawlerController->crawl();




