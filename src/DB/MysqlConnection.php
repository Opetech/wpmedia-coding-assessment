<?php

namespace App\DB;

use PDO;

class MysqlConnection extends AbstractDBConnection implements Connection
{
    public function __construct()
    {
        $this->host     = $_ENV["DB_HOST"];
        $this->database = $_ENV["DB_NAME"];
        $this->username = $_ENV["DB_USERNAME"];
        $this->password = $_ENV["DB_PASSWORD"];
    }

    public function connection(): \PDO
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
        $this->connection = new PDO($dsn, $this->username, $this->password);

        return $this->connection;
    }

    public function close(): void
    {
        $this->connection = null;
    }
}
