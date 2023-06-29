<?php


namespace App\DB;


abstract class AbstractDBConnection
{
    protected string $host;
    protected string $username;
    protected string $password;
    protected string $database;

    protected $connection;
}
