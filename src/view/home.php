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
    <link rel="stylesheet" href="css/home.css">
    <title>MarFit Store</title>
</head>

<body>
    <header>
        <a href="/home">Home</a>
        <h1>MarFit Store</h1>
        <a href="/admin">Administração</a>
    </header>

    <main>
        <div class="produtos">
            <?php foreach ($produtos as $produto): ?>
                <div class="produto">
                    <img class="image" src="images/image.jpg">
                    <div class="data">
                        <p><?= $produto->getName(); ?></p>
                        <p><?= $produto->getDescription(); ?></p>
                        <p><?= $produto->getFormattedPrice(); ?></p>
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