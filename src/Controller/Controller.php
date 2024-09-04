<?php

namespace Pansiere\MarFit\Controller;

class Controller
{
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
        $productRepository = $this;
        $productRepository->delete($product_id);

        header("Location: /admin");
        exit();
    }

    public function update($product_id) {}

    public function admin(array $produtos)
    {
        require __DIR__ . "/../view/admin.php";
    }

    public function home(array $produtos)
    {
        require __DIR__ . "/../view/home.php";
    }
}
