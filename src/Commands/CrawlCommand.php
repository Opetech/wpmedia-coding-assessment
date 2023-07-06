<?php


namespace App\Commands;


use App\Repository\InternalLinksRepositoryImpl;

class CrawlCommand implements Command
{
    private Crawler $crawler;
    private string $url;

    public function __construct(Crawler $crawler, $url)
    {
        $this->crawler = $crawler;
        $this->url = $url;
    }

    public function execute(): void
    {
         $this->crawler->setInternalLinksRepository(new InternalLinksRepositoryImpl());
         $this->crawler->crawl($this->url);
    }
}
