<?php

namespace App\Service;

use App\DB\Connection;
use App\DB\MysqlConnection;
use App\Dto\LoginRequest;

class AuthService
{
    private Connection $connection;

    public function authenticate(LoginRequest $request)
    {
        $this->connection = new MysqlConnection();
        $query  = 'SELECT * FROM admin WHERE email=:email';
        $statement  = $this->connection->connection()->prepare($query);
        $statement->execute(['email' => $request->getEmail()]);
        $result = $statement->fetch();
        $this->connection->close();

        $passwordMatches = password_verify($request->getPassword(), $result['password']);

    }
}
