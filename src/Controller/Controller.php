<?php

namespace Pansiere\MarFit\Controller;

use Pansiere\MarFit\Repositories\ProductRepository;
use Pansiere\MarFit\Database\Database;
use Pansiere\MarFit\Models\Product;

class Controller
{
    private $productRepository;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->productRepository = new ProductRepository($pdo);
    }

    public function form()
    {
        $product = null;
        require __DIR__ . "/../view/form.php";
    }

    public function formEdit($product_id)
    {
        $product = $this->productRepository->find($product_id);
        require __DIR__ . "/../view/form.php";
    }

    public function save()
    {
        if (isset($_POST['register'])) {
            $type = $_POST['type'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

            $product = new Product(null, $type, $name, $description, $price, $quantity, null);

            if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
                $image = uniqid() . $_FILES['image']['name'];
                $product->setImage($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $product->getImageDirectory());
            }

            $this->productRepository->save($product);

            header("Location: /admin");
            exit();
        }
    }

    public function delete($product_id)
    {
        $this->productRepository->delete($product_id);
        header("Location: /admin");
        exit();
    }

    public function update($product_id)
    {
        $this->productRepository->update(
            $product_id,
            $_POST['type'],
            $_POST['name'],
            $_POST['description'],
            (int) $_POST['quantity'],
            (float) $_POST['price'],
        );

        header("Location: /admin");
        exit();
    }

    public function admin()
    {
        $produtos = $this->productRepository->findAll();
        require __DIR__ . "/../view/admin.php";
    }

    public function home()
    {
        $produtos = $this->productRepository->findAll();
        require __DIR__ . "/../view/home.php";
    }
}
