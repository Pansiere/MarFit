<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Pansiere\MarFit\Config\Config;

$connenction = Config::createConnection();

var_dump($connenction);

// require_once __DIR__ . '/../vendor/autoload.php';

// use Pansiere\MarFit\DataBase\ConnectorCreator;
// use Pansiere\MarFit\Repositories\ProductRepository;
// use Pansiere\MarFit\Models\Product;

// $connector = new ConnectorCreator(__DIR__ . './../data/db.sqlite');
// $pdo = $connector->createConnection();

// $productRepository = new ProductRepository($pdo);
// $produtos = $productRepository->findAll();

// if (isset($_POST['register'])) {
//     $type = htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8');
//     $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
//     $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
//     $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
//     $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

//     $product = new Product(null, $type, $name, $description, $price, $quantity, null);

//     if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
//         $image = uniqid() . $_FILES['image']['name'];
//         $product->setImage($image);
//         move_uploaded_file($_FILES['image']['tmp_name'], $product->getImageDirectory());
//     }

//     $productRepository->save($product);

//     header("Location: admin.php");
//     exit();
// }

// 

// <?php

    // if (isset($_POST['id'])) {
    //     $produto = $productRepository->find($_POST['id']);
    //     $id = $_POST['id'];
    // }
    // if (isset($_POST['edit'])) {
    //     $id = (int)$_POST['id'];
    //     $type = htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8');
    //     $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    //     $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
    //     $price = (float) $_price;
    //     $quantity = (int)$_POST['quantity'];

    //     if ($_FILES['image']['name'] != '') {
    //         $imageName = uniqid() . $_FILES['image']['name'];
    //         $imageDirectory = 'img/' . $imageName;
    //         move_uploaded_file($_FILES['image']['tmp_name'], $imageDirectory);

    //         $productRepository->updateWithImage($id, $type, $name, $description, $price, $quantity, $imageName);
    //     } else {
    //         $productRepository->update($id, $type, $name, $description, $price, $quantity);
    //     }

    //     header("Location: admin.php");
    //     exit();
    // }

    // 

    // if (isset($_POST['id'])) {
    //     $productRepository->delete($_POST['id']);

    //     header("Location: admin.php");
    //     exit();
    // }
    // 
