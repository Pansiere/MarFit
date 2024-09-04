<?php

namespace Pansiere\MarFit\Controller;

use Pansiere\MarFit\Repositories\ProductRepository;
use Pansiere\MarFit\Database\Database;

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
        $produto_id = null;
        $produtos = $this;
        require __DIR__ . "/../public/formulario.php";
    }

    public function formEdit($product_id) {}

    public function save() {}

    public function delete($product_id)
    {
        $this->productRepository->delete($product_id);

        header("Location: /admin");
        exit();
    }

    public function update($product_id) {}

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
