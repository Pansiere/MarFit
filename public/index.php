<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/helper.php';

session_start();

use Pansiere\MarFit\Controller\Controller;

$uri = strtok($_SERVER['REQUEST_URI'], '?');
$page = rtrim($uri, '/') ?: '/';

$controller = new Controller();

switch ($page) {
    case "/form":
        $controller->form();
        break;

    case "/formEdit":
        $controller->formEdit($_POST['product_id']);
        break;

    case "/save":
        $controller->save();
        break;

    case "/delete":
        $controller->delete($_POST['product_id']);
        break;

    case "/update":
        $controller->update($_POST['product_id']);
        break;

    case "/admin":
        $controller->admin();
        break;

    default:
        $controller->home();
}
