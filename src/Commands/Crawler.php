<?php

namespace App\Commands;

use App\Dto\InternalLinkDto;
use App\Repository\InternalLinksRepository;
use App\Repository\InternalLinksRepositoryImpl;
use App\Service\SitemapGeneratorService;
use App\Utils\CronUtil;
use DOMDocument;

class Crawler
{
    private InternalLinksRepository $internalLinksRepository;

    public function __construct()
    {
        $this->internalLinksRepository = new InternalLinksRepositoryImpl();
    }

    public function crawl(string $url)
    {
        if (count($this->internalLinksRepository->findAll()) > 0) {
            $this->internalLinksRepository->deleteAll();
        }
        $crawlResultArray = $this->startCrawlingProcess($url);
        //handle sitemap generation process
        new SitemapGeneratorService($crawlResultArray);
        //Setup cron job to run the crawl every hour
        CronUtil::createCrawlerCronJob();

        //save results into database
        foreach ($crawlResultArray as $hyperlink) {
            $internalLinkDto = new InternalLinkDto($_ENV['APP_BASE_URL'], $hyperlink["url"]);
            $this->internalLinksRepository->save($internalLinkDto);
        }

        $this->renameHomepageFile();
    }

    private function renameHomepageFile(): void
    {
        $homepageFilepath = __DIR__ . '/../../public/views/home.php';
        if (file_exists($homepageFilepath))
            rename($homepageFilepath, __DIR__ . '/../../public/views/home.html');
    }

    private function startCrawlingProcess(string $url): array
    {
        $results = [];
        // Get the HTML content of the URL
        $html = file_get_contents($url);

        // Create a DOMDocument object and load the HTML
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_clear_errors();

        // Find and process all anchor tags
        $anchorTags = $dom->getElementsByTagName('a');
        foreach ($anchorTags as $anchorTag) {
            $href = $anchorTag->getAttribute('href');
            $absoluteUrl = $this->getAbsoluteUrl($href);
            $results[]   = ['url' => $absoluteUrl];
        }

        return $results;
    }

    private function getAbsoluteUrl(string $href)
    {
        return $_ENV['APP_BASE_URL'] . $href;
    }
}
