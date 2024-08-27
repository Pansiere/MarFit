<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

use Pansiere\MarFit\Repositories\ProductRepository;
use Pansiere\MarFit\Models\Product;

$produtoRepositorio = new ProductRepository($pdo);

#$dadosCafe = $produtoRepositorio->opcoesCafe();
#$dadosAlmoco = $produtoRepositorio->opcoesAlmoco();
#$produtos = $produtoRepositorio->buscarTodos();

if (isset($_GET['id'])) {
    $produto = $produtoRepositorio->buscar((int)$_GET['id']);
}

if (isset($_POST['editar'])) {
    $id = (int)$_GET['id'];
    $tipo = htmlspecialchars($_POST['tipo'], ENT_QUOTES, 'UTF-8');
    $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
    $descricao = htmlspecialchars($_POST['descricao'], ENT_QUOTES, 'UTF-8');
    $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);

    if ($_FILES['imagem']['name'] != '') {
        $nomeDaImagem = uniqid() . $_FILES['imagem']['name'];
        $diretoriaDoImagem = 'img/' . $nomeDaImagem;
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretoriaDoImagem);

        $produtoRepositorio->editarComImagem($id, $tipo, $nome, $descricao, $preco, $nomeDaImagem);
    } else {
        $produtoRepositorio->editar($id, $tipo, $nome, $descricao, $preco);
    }

    header("Location: admin.php");
    exit();
}

if (isset($_POST['cadastro'])) {
    $tipo = htmlspecialchars($_POST['tipo'], ENT_QUOTES, 'UTF-8');
    $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
    $descricao = htmlspecialchars($_POST['descricao'], ENT_QUOTES, 'UTF-8');
    $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);

    $produto = new Product(null, $tipo, $nome, $descricao, $preco, null);

    if (isset($_FILES['imagem']) && $_FILES['imagem']['name'] != '') {
        $imagem = uniqid() . $_FILES['imagem']['name'];
        $produto->setImagem($imagem);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $produto->getImagemDiretorio());
    }

    $produtoRepositorio->salvar($produto);

    header("Location: admin.php");
    exit();
}
