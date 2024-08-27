<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Pansiere\MarFit\DataBase\ConnectorCreator;
use Pansiere\MarFit\Repositories\ProductRepository;

$connector = new ConnectorCreator(__DIR__ . './../data/db.sqlite');
$pdo = $connector->createConnection();

$productRepository = new ProductRepository($pdo);
$produtos = $productRepository->buscarTodos();

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="
            width=device-width,
            user-scalable=no,
            initial-scale=1.0,
            maximum-scale=1.0,
            minimum-scale=1.0
        ">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <title>MarFit Store</title>
</head>

<body>
    <header>
        <h1>MarFit Store</h1>
    </header>


    <main>
        <div class="produto">
            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="produto">
                        <p><img src="img/<?php echo htmlspecialchars($produto->getImagem()); ?>" alt="<?php echo htmlspecialchars($produto->getNome()); ?>"></p>
                        <p><?php echo htmlspecialchars($produto->getNome()); ?></p>
                        <p><?php echo htmlspecialchars($produto->getDescricao()); ?></p>
                        <p><?php echo htmlspecialchars($produto->getPrecoFormatado()); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Sem produtos disponíveis.</p>
            <?php endif; ?>
        </div>

    </main>

    <footer>
        <h2>Rodapé</h2>
    </footer>

</body>

</html>