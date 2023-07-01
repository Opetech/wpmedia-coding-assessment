<?php

namespace App\Service;

use App\Repository\InternalLinksRepository;
use App\Repository\InternalLinksRepositoryImpl;

class DefaultCrawlerService implements CrawlerService
{
    private InternalLinksRepository $internalLinksRepository;

    public function __construct()
    {
        $this->internalLinksRepository = new InternalLinksRepositoryImpl();
    }

    public function crawl()
    {
        if (count($this->internalLinksRepository->findAll()) > 0) {
            $this->internalLinksRepository->deleteAll();
        }
        $this->deleteSitemapFileIfExist();
        $this->startCrawlingProcess();
    }

    private function deleteSitemapFileIfExist()
    {

    }

    private function startCrawlingProcess()
    {
        
    }
}
