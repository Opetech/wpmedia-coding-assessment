<?php

namespace Tests\Unit\Controllers;

use App\Controllers\AdminController;
use App\Service\AdminService;
use PHPUnit\Framework\TestCase;

class AdminControllerTest extends TestCase
{
    public function testGetCrawledLinks()
    {
        // Create a mock object of the AdminService
        $adminServiceMock = $this->createMock(AdminService::class);
        $adminServiceMock->expects($this->once())
            ->method('getCrawledLinks')
            ->willReturn(['link1', 'link2']);

        $adminController = new AdminController($adminServiceMock);

        $result = $adminController->getCrawledLinks();

        $this->assertEquals(['link1', 'link2'], $result);
    }
}
