<?php

namespace App\Controllers;

use App\Repository\InternalLinksRepositoryImpl;
use App\Service\AdminService;

class AdminController
{
    private AdminService $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function getCrawledLinks()
    {
        $this->adminService->setInternalLinksRepository(new InternalLinksRepositoryImpl());
        return $this->adminService->getCrawledLinks();
    }
}
