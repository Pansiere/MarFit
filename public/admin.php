<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Pansiere\MarFit\DataBase\ConnectorCreator;
use Pansiere\MarFit\Repositories\ProductRepository;

$connector = new ConnectorCreator(__DIR__ . './../data/db.sqlite');
$pdo = $connector->createConnection();

$productRepository = new ProductRepository($pdo);
$produtos = $productRepository->findAll();

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
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($produtos)): ?>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($produto->getId()); ?></td>
                            <td><?php echo htmlspecialchars($produto->getName()); ?></td>
                            <td><?php echo htmlspecialchars($produto->getDescription()); ?></td>
                            <td><?php echo htmlspecialchars($produto->getFormattedPrice()); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo htmlspecialchars($produto->getId()); ?>&action=editar">Editar</a>
                                <a href="actions.php?id=<?php echo htmlspecialchars($produto->getId()); ?>&action=delete">Excluir</a>
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