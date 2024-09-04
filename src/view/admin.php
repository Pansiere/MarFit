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
                            <td><?= $produto->getId(); ?></td>
                            <td><?= $produto->getName(); ?></td>
                            <td><?= $produto->getDescription(); ?></td>
                            <td><?= $produto->getFormattedPrice(); ?></td>
                            <td><?= $produto->getQuantity(); ?></td>
                            <td>
                                <form action="/formEdit" method="post" style="display: inline;">
                                    <input type="hidden" name="product_id" value="<?= $produto->getId(); ?>">
                                    <button type="submit">Editar</button>
                                </form>
                                <form action="/delete" method="post" style="display: inline;">
                                    <input type="hidden" name="product_id" value="<?= $produto->getId(); ?>">
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
        <a href="/form">Adicionar produto</a>
    </main>

    <footer>
        <h2>Rodapé</h2>
    </footer>

</body>

</html>