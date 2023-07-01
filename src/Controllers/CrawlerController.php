<?php


namespace App\Controllers;


use App\Service\CrawlerService;

class CrawlerController
{
    private CrawlerService $crawlerService;

    public function __construct(CrawlerService $crawlerService){
        $this->crawlerService = $crawlerService;
    }

    public function crawl(): void
    {
        $this->crawlerService->crawl();
    }
}
