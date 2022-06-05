<?php

namespace App\Models;

class Request
{
    public static array $data;

    public static function post(): array
    {
        return self::$data = $_POST;
    }

    public static function get(): array
    {
        return self::$data = $_GET;
    }
}
