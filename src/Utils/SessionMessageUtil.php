<?php


namespace App\Utils;


class SessionMessageUtil
{
    public static function set(string $key, string $message): void
    {
        $_SESSION[$key] = $message;
    }
}
