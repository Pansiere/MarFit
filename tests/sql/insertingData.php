<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Pansiere\MarFit\DataBase\ConnectorCreator;

$connector = new ConnectorCreator(__DIR__ . '/../data/db.sqlite');
$pdo = $connector->createConnection();

$insertDataSql = '
    INSERT INTO unit_of_measure (name) VALUES ("G"), ("GG"), ("M"), ("P");

    INSERT INTO products (name, type, description, price, image, unit_of_measure_id, quantity) VALUES 
        ("Camisa", "regata","Preta c verde", 10, "image.jpg", 1, 50),
        ("Top", "parte de cima", "Rosa", 50, "image.jpg", 2, 10);

';

$pdo->exec($insertDataSql);
