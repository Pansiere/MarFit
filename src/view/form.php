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
        <a href="/home">Home</a>
        <div>
            <h1>Victoria Lavagnoli</h1>
            <h2>Painel de Administração</h2>
        </div>
        <a href="/admin">Administração</a>
    </header>

    <main>
        <h2><?= $product ? "Editando item: " . $product->getName() . "<br>ID: " . $product->getId() : 'Cadastro de produto' ?></h2>
        <form action="<?= $product ? '/update' : '/save' ?>" method="post" enctype="multipart/form-data">
            <label for="type">Tipo:</label>
            <input type="text" name="type" id="type" value="<?= $product ? $product->getType() : '' ?>" required>
            <br>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="<?= $product ? $product->getName() : '' ?>" required>
            <br>
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" value="<?= $product ? $product->getDescription() : '' ?>" required></textarea>
            <br>
            <label for="price">Preço:</label>
            <input type="text" name="price" id="price" value="<?= $product ? $product->getPrice() : '' ?>" required>
            <br>
            <label for="quantity">Quantidade:</label>
            <input type="text" name="quantity" id="quantity" value="<?= $product ? $product->getQuantity() : '' ?>" required>
            <br>
            <label for="image">Imagem:</label>
            <input type="file" name="image" id="image">
            <br>
            <input type="hidden" name="product_id" id="product_id" value="<?= $product ? $_POST['product_id'] : '' ?>" required>
            <button type="submit" name="register"><?= $product ? 'Atualizar Produto' : 'Cadastrar Produto' ?></button>
        </form>
    </main>

    <footer>
        <h2>Rodapé</h2>
    </footer>

</body>

</html>