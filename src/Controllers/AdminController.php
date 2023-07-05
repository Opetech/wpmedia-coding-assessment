<?php

namespace App\Controllers;

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
        return $this->adminService->getCrawledLinks();
    }
}
