<?php


namespace App\Service;


use App\Repository\InternalLinksRepository;
use App\Repository\InternalLinksRepositoryImpl;

class AdminService
{
    private InternalLinksRepository $internalLinksRepository;

    public function __construct()
    {
        $this->internalLinksRepository = new InternalLinksRepositoryImpl();
    }

    public function getCrawledLinks()
    {
         return $this->internalLinksRepository->findAll();
    }
}
