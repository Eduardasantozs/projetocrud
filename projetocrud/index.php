<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Portal de Notícias</title>
    <style>/* Reset de margens, padding e box-sizing */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Estilos gerais */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f5;
    color: #333;
    line-height: 1.6;
    margin: 0;
    padding: 0;
}

/* Cabeçalho */
header {
    background: linear-gradient(135deg, #ff007f, #ff66b2); /* Gradiente rosa */
    color: white;
    padding: 20px 0;
    text-align: center;
    width: 100%;
    box-sizing: border-box;
    border-bottom: 2px solid #e60073; /* Rosa mais escuro */
    position: relative;
}

header .logo img {
    max-height: 50px;
    width: auto;
}

header h1 {
    font-size: 2.5rem;
    margin: 0;
    font-weight: 700;
}

header .login {
    position: absolute;
    top: 20px;
    right: 20px;
}

header .login a {
    color: white;
    text-decoration: none;
    font-size: 1.2rem;
    font-weight: 700;
    transition: color 0.3s ease;
}

header .login a:hover {
    color: #ff3385; /* Rosa mais escuro */
}

/* Main section */
main {
    padding: 40px 20px;
    text-align: center;
}

main h1 {
    font-size: 2.8rem;
    color: #ff007f; /* Rosa primário */
    margin-bottom: 30px;
}

.noticias {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin-top: 30px;
}

.noticias article {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.noticias article:hover {
    transform: translateY(-5px); /* Efeito de elevação ao passar o mouse */
}

.noticias img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.manchete-conteudo {
    padding: 15px;
}

.manchete-conteudo h2 {
    font-size: 1.8rem;
    color: #e60073; /* Rosa escuro */
    margin-bottom: 15px;
}

.manchete-conteudo p {
    color: #555;
    font-size: 1rem;
    line-height: 1.6;
}

/* Rodapé */
footer {
    background-color: #ff007f; /* Rosa primário */
    color: white;
    text-align: center;
    padding: 20px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}

footer p {
    font-size: 1rem;
}
</style>
</head>

<body>
    <!-- Cabeçalho -->
    <header>
        <div class="logo">
            <img src="img/noticias.png" alt="Logo" >
        </div>
        <div class="login">
            <a href="login.php" class="">Login</a>
        </div>
    </header>

    <?php
    include_once './config/config.php';
    include_once './classes/Noticia.php';
    $noticias = new Noticia($db);
    $dados = $noticias->ler();
    ?>

    <main>
        <h1>Bem-vindo ao Portal de Notícias</h1>

        <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
            <section class="noticias">

                <article>
                    <img src="<?php echo htmlspecialchars($row['imagem']); ?>" alt="Imagem da manchete" class="imagem-manchete">
                    <div class="manchete-conteudo">
                        <h2><?php echo htmlspecialchars($row['titulo']); ?></h2>
                        <p><?php echo htmlspecialchars($row['conteudo']); ?></p>
                    </div>
                </article>

            <?php endwhile; ?>
            </section>

    </main>

    <footer>
        <p>&copy; 2024 Portal de Notícias ||Todos os direitos reservados a Maria.</p>
    </footer>
</body>

</html>
