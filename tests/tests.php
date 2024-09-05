<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Pansiere\MarFit\DataBase\ConnectorCreator;
use Pansiere\MarFit\Repositories\ProductRepository;
use Pansiere\MarFit\Models\Product;
