<?php

namespace Pansiere\MarFit\Database;

class Database
{
    private static $pdo;

    public static function getConnection(): \PDO
    {
        if (!self::$pdo) {
            self::$pdo = new \PDO('sqlite:' . __DIR__ . '/../../data/db.sqlite');
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return self::$pdo;
    }
}
