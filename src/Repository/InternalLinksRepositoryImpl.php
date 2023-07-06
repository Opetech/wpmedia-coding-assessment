<?php

namespace App\Repository;

use App\DB\Connection;
use App\Dto\InternalLinkDto;

class InternalLinksRepositoryImpl implements InternalLinksRepository
{
    private Connection $connection;

    public function setConnection(Connection $connection){
        $this->connection = $connection;
    }

    public function findAll(): array
    {
        $statement = $this->connection->connection()->prepare('SELECT * FROM internal_links');
        $statement->execute();

        return $statement->fetchAll();
    }

    public function save(InternalLinkDto $data): void
    {
        $query     = 'INSERT INTO internal_links (source_url, target_url) VALUES (?,?)';
        $statement = $this->connection->connection()->prepare($query);
        $statement->execute([$data->getSourceUrl(), $data->getTargetUrl()]);
    }

    public function deleteAll(): void
    {
        $statement = $this->connection->connection()->prepare('DELETE FROM internal_links');
        $statement->execute();
    }
}
