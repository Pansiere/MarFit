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
        <h2>Editando o produto #000<?= $_POST['id'] ?></h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="type">Tipo:</label>
            <input type="text" name="type" id="type" value="<?= $produto->getType(); ?>" required>
            <br>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="<?= $produto->getName(); ?>" required>
            <br>
            <label for="price">Preço:</label>
            <input type="text" name="price" id="price" value="<?= $produto->getFormattedPrice(); ?>" required>
            <br>
            <label for="quantity">Quantidade:</label>
            <input type="text" name="quantity" id="quantity" value="<?= $produto->getQuantity(); ?>" required>
            <br>
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" required></textarea>
            <br>
            <label for="image">Imagem:</label>
            <input type="file" name="image" id="image">
            <br>
            <input type="hidden" name="id" id="id" value="<?= $id ?>">
            <button type="submit" name="edit">Editar Produto</button>
        </form>

    </main>

    <footer>
        <h2>Rodapé</h2>
    </footer>

</body>

</html>