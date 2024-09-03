<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Pansiere\MarFit\DataBase\ConnectorCreator;
use Pansiere\MarFit\Repositories\ProductRepository;
use Pansiere\MarFit\Models\Product;

$connector = new ConnectorCreator(__DIR__ . './../data/db.sqlite');
$pdo = $connector->createConnection();

$productRepository = new ProductRepository($pdo);
$produtos = $productRepository->findAll();

if (isset($_POST['register'])) {
    $type = htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

    $product = new Product(null, $type, $name, $description, $price, $quantity, null);

    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $image = uniqid() . $_FILES['image']['name'];
        $product->setImage($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $product->getImageDirectory());
    }

    $productRepository->save($product);

    header("Location: admin.php");
    exit();
}

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/admin.css">
    <title>Painel de Administração - MarFit Store</title>
</head>

<body>
    <header>
        <a href="index.php">Home</a>
        <div>
            <h1>Victoria Lavagnoli</h1>
            <h2>Painel de Administração</h2>
        </div>
        <a href="admin.php">Administração</a>
    </header>

    <main>
        <h2>Cadastro de produto</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="type">Tipo:</label>
            <input type="text" name="type" id="type" required>
            <br>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" required>
            <br>
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" required></textarea>
            <br>
            <label for="price">Preço:</label>
            <input type="text" name="price" id="price" required>
            <br>
            <label for="quantity">Quantidade:</label>
            <input type="text" name="quantity" id="quantity" required>
            <br>
            <label for="image">Imagem:</label>
            <input type="file" name="image" id="image">
            <br>
            <button type="submit" name="register">Cadastrar Produto</button>
        </form>

    </main>

    <footer>
        <h2>Rodapé</h2>
    </footer>

</body>

</html>