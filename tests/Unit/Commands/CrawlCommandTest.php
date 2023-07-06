<?php


namespace Tests\Unit\Commands;


use App\Commands\CrawlCommand;
use App\Commands\Crawler;
use PHPUnit\Framework\TestCase;

class CrawlCommandTest extends TestCase
{
    public function testExecute()
    {
        $url = 'http://localhost:8000';

        // Mock the dependencies
        $crawlerMock = $this->getMockBuilder(Crawler::class)
            ->disableOriginalConstructor()
            ->getMock();

        $crawlerMock->expects($this->once())
            ->method('crawl')
            ->with($url);

        $crawlCommand = new CrawlCommand($crawlerMock, $url);

        $crawlCommand->execute();
    }
}
