<?php


namespace App\Repository;


use App\Dto\InternalLinkDto;

interface InternalLinksRepository
{
    public function findAll(): array;

    public function save(InternalLinkDto $internalLinkDto): void;

    public function deleteAll(): void;
}
