<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Pansiere\MarFit\DataBase\ConnectorCreator;

$connector = new ConnectorCreator(__DIR__ . '/../../data/db.sqlite');
$pdo = $connector->createConnection();

$createTablesSql = '
    CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY,
        name TEXT,
        type TEXT,
        description TEXT,
        price REAL,
        image TEXT,
        unit_of_measure_id INTEGER,
        quantity INTEGER,
        FOREIGN KEY(unit_of_measure_id) REFERENCES unit_of_measure(id)
    );

    CREATE TABLE IF NOT EXISTS unit_of_measure (
        id INTEGER PRIMARY KEY,
        name TEXT
    );
';

$pdo->exec($createTablesSql);
