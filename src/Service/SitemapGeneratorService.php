<?php

namespace App\Service;

use DOMDocument;

class SitemapGeneratorService
{
    private string $sitemapFilePath = __DIR__ . '/../../public/views/sitemap.html';

    public function __construct(array $content)
    {
        assert(count($content) > 0);

        $this->deleteSitemapFileIfExist();
        $this->createAndWriteToSitemapFile($content);
    }

    private function deleteSitemapFileIfExist()
    {
        if (file_exists($this->sitemapFilePath)) {
            unlink($this->sitemapFilePath);
        } else {
            var_dump("False");
        }
    }

    private function createAndWriteToSitemapFile(array $content)
    {
        $file = fopen($this->sitemapFilePath, 'w');
        $html = $this->generateSitemapXml($content);
        fwrite($file, $html);
        fclose($file);
    }

    private function generateSitemapXml(array $content)
    {
        $xmlDoc               = new DOMDocument('1.0', 'UTF-8');
        $xmlDoc->formatOutput = true;

        $urlset = $xmlDoc->createElement('urlset');
        $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($content as $link) {
            $url = $xmlDoc->createElement('url');
            $loc = $xmlDoc->createElement('loc', $link['url']);
            $url->appendChild($loc);
            $urlset->appendChild($url);
        }
        $xmlDoc->appendChild($urlset);

        return $xmlDoc->saveXML();
    }
}
