<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Pansiere\MarFit\Database\ConnectorCreator;

$dbFile = __DIR__ . '/../database/database.sqlite';
$connector = new ConnectorCreator($dbFile);
$pdo = $connector->createConnection();
