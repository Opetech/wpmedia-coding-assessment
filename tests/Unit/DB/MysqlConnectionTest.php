<?php

namespace Tests\Unit\DB;

use App\DB\MysqlConnection;
use PHPUnit\Framework\TestCase;
use PDO;

class MysqlConnectionTest extends TestCase
{
    public function testConnection()
    {
        // Set up environment variables
        $_ENV["DB_HOST"] = "mysql";
        $_ENV["DB_NAME"] = "wpmedia_assessment";
        $_ENV["DB_USERNAME"] = "root";
        $_ENV["DB_PASSWORD"] = "root";

        $mysqlConnection = new MysqlConnection();
        $connection = $mysqlConnection->connection();

        $this->assertInstanceOf(PDO::class, $connection);
    }
}







