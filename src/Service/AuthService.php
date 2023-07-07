<?php

namespace App\Service;

use App\DB\Connection;
use App\DB\MysqlConnection;
use App\Dto\LoginRequest;
use App\Exception\InvalidCredentialException;

class AuthService
{
    private Connection $connection;

    public function authenticate(LoginRequest $request)
    {
        $credentialIsValid = false;
        $this->connection  = new MysqlConnection();

        $query     = 'SELECT * FROM admin WHERE email=:email';
        $statement = $this->connection->connection()->prepare($query);
        $statement->execute(['email' => $request->getEmail()]);
        $result = $statement->fetch();
        if (is_array($result) && count($result) > 0) {
            $credentialIsValid = password_verify($request->getPassword(), $result['password']);
        }
        $this->connection->close();

        if (!$credentialIsValid) {
            throw new InvalidCredentialException("Invalid Credentials");
        }

        return $result;
    }
}
