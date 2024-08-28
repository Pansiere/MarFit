<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Pansiere\MarFit\DataBase\ConnectorCreator;
use Pansiere\MarFit\Repositories\ProductRepository;

$connector = new ConnectorCreator(__DIR__ . './../data/db.sqlite');
$pdo = $connector->createConnection();

$productRepository = new ProductRepository($pdo);
$produtos = $productRepository->findAll();

echo var_dump($produtos);
