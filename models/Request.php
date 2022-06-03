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

    public static function put(): array
    {
        $_PUT = [];
        parse_str(file_get_contents('php://input'), $_PUT);

        return self::$data = $_PUT;
    }
}
