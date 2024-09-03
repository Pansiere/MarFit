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
        <a href="index.php">Home</a>
        <h1>MarFit Store</h1>
        <a href="admin.php">Administração</a>
    </header>


    <main>
        <div class="produtos">
            <?php foreach ($produtos as $produto): ?>
                <div class="produto">
                    <img class="image" src="images/image.jpg">
                    <div class="data">
                        <p><?= htmlspecialchars($produto->getName()); ?></p>
                        <p><?= htmlspecialchars($produto->getDescription()); ?></p>
                        <p><?= htmlspecialchars($produto->getFormattedPrice()); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </main>

    <footer>
        <h2>Rodapé</h2>
    </footer>

</body>

</html>