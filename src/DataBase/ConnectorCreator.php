<?php

namespace Pansiere\MarFit\Database;

use PDO;
use PDOException;

class ConnectorCreator
{
    private string $dsn;
    private string $user;
    private string $password;

    public function __construct(string $dbFile, string $user = '', string $password = '')
    {
        $this->dsn = "sqlite:$dbFile";
        $this->user = $user;
        $this->password = $password;
    }

    public function createConnection(): PDO
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }
    }
}
