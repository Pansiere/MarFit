<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Pansiere\MarFit\DataBase\ConnectorCreator;

$connector = new ConnectorCreator(__DIR__ . '/../data/db.sqlite');
$pdo = $connector->createConnection();

$createTableSql = '
    CREATE TABLE IF NOT EXISTS produtos (
        id INTEGER PRIMARY KEY,
        name TEXT,
        descricao TEXT,
        preco REAL,
        imagem TEXT,
        unidade_de_medida_id INTEGER,
        FOREIGN KEY(unidade_de_medida_id) REFERENCES unidade_de_medida(id)
    );

    CREATE TABLE IF NOT EXISTS unidade_de_medida (
        id INTEGER PRIMARY KEY,
        name TEXT
    );

    INSERT INTO unidade_de_medida (name) VALUES ("G"), ("GG"), ("M"), ("P");    

    INSERT INTO produtos (name, descricao, preco, imagem, unidade_de_medida_id) VALUES ("camisa", "camisa grandona", 10, "imagem", 1);
';

$pdo->exec($createTableSql);
