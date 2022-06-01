<?php

namespace App\Config;

use Exception;
use PDO;

class Database
{
    private static $Pdo;
    public static array $errorArr;

    public static function getConnected(): PDO|array
    {
        if (is_null(self::$Pdo)) {
            require_once('config/config.php');

            try {
                self::$Pdo = new PDO('mysql:dbname=' . DB_NAME . ';host=' . HOST, DB_USERNAME, DB_PASSWORD);
            } catch (Exception $e) {
                return self::$errorArr = [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode()
                ];
            }
        }

        return self::$Pdo;
    }
}
