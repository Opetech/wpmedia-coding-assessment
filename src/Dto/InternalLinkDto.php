<?php


namespace App\Dto;


class InternalLinkDto
{
     private string $sourceUrl;
     private string $targetUrl;

    /**
     * @param string $sourceUrl
     * @param string $targetUrl
     */
    public function __construct(string $sourceUrl, string $targetUrl)
    {
        $this->sourceUrl = $sourceUrl;
        $this->targetUrl = $targetUrl;
    }

    /**
     * @return string
     */
    public function getSourceUrl(): string
    {
        return $this->sourceUrl;
    }

    /**
     * @return string
     */
    public function getTargetUrl(): string
    {
        return $this->targetUrl;
    }
}
