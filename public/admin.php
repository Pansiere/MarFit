<?php

require_once __DIR__ . '/../vendor/autoload.php';


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
        <h1>Painel de Administração</h1>
    </header>

    <main>
        <h2>Cadastrar Produto</h2>
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo" required>
            <br>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            <br>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" required></textarea>
            <br>
            <label for="preco">Preço:</label>
            <input type="text" name="preco" id="preco" required>
            <br>
            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" id="imagem">
            <br>
            <button type="submit" name="cadastro">Cadastrar Produto</button>
        </form>

        <h2>Produtos Cadastrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($produtos)): ?>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($produto->getId()); ?></td>
                            <td><?php echo htmlspecialchars($produto->getNome()); ?></td>
                            <td><?php echo htmlspecialchars($produto->getDescricao()); ?></td>
                            <td><?php echo htmlspecialchars($produto->getPrecoFormatado()); ?></td>
                            <td><img src="../img/<?php echo htmlspecialchars($produto->getImagem()); ?>" alt="<?php echo htmlspecialchars($produto->getNome()); ?>" style="max-width: 100px;"></td>
                            <td>
                                <a href="admin.php?id=<?php echo htmlspecialchars($produto->getId()); ?>&action=delete">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Nenhum produto cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <h2>Rodapé</h2>
    </footer>

</body>

</html>