<?php


namespace App\Service;


use App\DB\MysqlConnection;
use App\Repository\InternalLinksRepository;

class AdminService
{
    private InternalLinksRepository $internalLinksRepository;

    public function setInternalLinksRepository(InternalLinksRepository $internalLinksRepository)
    {
        $this->internalLinksRepository = $internalLinksRepository;
    }

    public function getCrawledLinks()
    {
        $this->internalLinksRepository->setConnection(new MysqlConnection());

        return $this->internalLinksRepository->findAll();
    }
}
