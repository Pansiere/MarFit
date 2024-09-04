<?php

namespace Pansiere\MarFit\Config;

use Pansiere\MarFit\Database\ConnectorCreator;

class Config
{
    public static function createConnection(): \PDO
    {
        $connector = new ConnectorCreator(__DIR__ . '/../data/db.sqlite');
        return $pdo = $connector->createConnection();
    }
}
