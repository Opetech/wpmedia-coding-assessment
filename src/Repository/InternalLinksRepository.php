<?php


namespace App\Repository;


interface InternalLinksRepository
{
    public function findAll(): array;

    public function save(): void;

    public function deleteAll(): void;
}
