<?php

session_start();

require_once '../vendor/autoload.php';

use Pansiere\MarFit\Produtos;

$uri = strtok($_SERVER['REQUEST_URI'], '?');
$page = rtrim($uri, '/') ?: '/';

// $produtos = new Produtos();

// switch ($page) {
//     case "/criar":
//         $produtos->criar();
//         break;

//     case "/editar":
//         $produtos->editar($_POST['produto_id']);
//         break;

//     case "/salvar":
//         $produtos->salvar();
//         break;

//     case "/deletar":
//         $produtos->deletar($_POST['produto_id']);
//         break;

//     case "/atualizar":
//         $produtos->atualizar($_POST['produto_id']);
//         break;

//     default:
//         $produtos->listar();
// }
