<?php

namespace App\DB;

interface Connection
{
    public function connection(): \PDO;

    public function close(): void;
}
