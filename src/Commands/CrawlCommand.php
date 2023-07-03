<?php


namespace App\Commands;


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
         $this->crawler->crawl($this->url);
    }
}
