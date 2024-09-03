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
        <h2>Produtos Cadastrados</h2>
        <table>
            <thead>
                <tr claas="table_tr">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody claas="table_body">
                <?php if (!empty($produtos)): ?>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?= htmlspecialchars($produto->getId()); ?></td>
                            <td><?= htmlspecialchars($produto->getName()); ?></td>
                            <td><?= htmlspecialchars($produto->getDescription()); ?></td>
                            <td><?= htmlspecialchars($produto->getFormattedPrice()); ?></td>
                            <td><?= htmlspecialchars($produto->getQuantity()); ?></td>
                            <td>
                                <form action="edit.php" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($produto->getId()); ?>">
                                    <button type="submit">Editar</button>
                                </form>
                                <form action="" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($produto->getId()); ?>">
                                    <button type="submit">Excluir</button>
                                </form>
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
        <a href="register.php">Adicionar produto</a>
    </main>

    <footer>
        <h2>Rodapé</h2>
    </footer>

</body>

</html>