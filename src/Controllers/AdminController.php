<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

use Pansiere\MarFit\Repositories\ProductRepository;
use Pansiere\MarFit\Models\Product;

// Create the database connection
$pdo = new PDO('sqlite:' . __DIR__ . '/../data/db.sqlite');
$productRepository = new ProductRepository($pdo);

if (isset($_GET['id'])) {
    $product = $productRepository->find((int)$_GET['id']);
}

if (isset($_POST['edit'])) {
    $id = (int)$_GET['id'];
    $type = htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

    if ($_FILES['image']['name'] != '') {
        $imageName = uniqid() . $_FILES['image']['name'];
        $imageDirectory = 'img/' . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $imageDirectory);

        $productRepository->updateWithImage($id, $type, $name, $description, $price, $imageName, $quantity);
    } else {
        $productRepository->update($id, $type, $name, $description, $price, $quantity);
    }

    header("Location: admin.php");
    exit();
}

if (isset($_POST['register'])) {
    $type = htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

    $product = new Product(null, $type, $name, $description, $price, null, $quantity);

    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $image = uniqid() . $_FILES['image']['name'];
        $product->setImage($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $product->getImageDirectory());
    }

    $productRepository->save($product);

    header("Location: admin.php");
    exit();
}
