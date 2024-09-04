<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Pansiere\MarFit\DataBase\ConnectorCreator;
use Pansiere\MarFit\Repositories\ProductRepository;
use Pansiere\MarFit\Controller\Controller;


//arquivo de config aqui em breve..
$connector = new ConnectorCreator(__DIR__ . '/../data/db.sqlite');
$pdo = $connector->createConnection();

$controller = new Controller();

$productRepository = new ProductRepository($pdo);
$produtos = $productRepository->findAll();

$uri = strtok($_SERVER['REQUEST_URI'], '?');
$page = rtrim($uri, '/') ?: '/';

switch ($page) {
    case "/form":
        $controller->form();
        break;

    case "/formEdit":
        $controller->formEdit($_POST['produto_id']);
        break;

    case "/save":
        $controller->save();
        break;

    case "/delete":
        $controller->delete($_POST['produto_id']);
        break;

    case "/update":
        $controller->update($_POST['produto_id']);
        break;

    case "/admin":
        $controller->admin($produtos);
        break;

    default:
        $controller->home($produtos);
}
