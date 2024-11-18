<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Bem-vindo(a), <?php echo $_SESSION['usuario']['nome']; ?>!</h1>
        <a href="index.php" id="sair">Sair</a>
    </header>

    <nav>
        <a href="cadastrarAutor.php">Cadastrar Autor</a>
        <a href="cadastrarLivro.php">Cadastrar Livro</a>
        <a href="listarLivros.php">Listar Livros</a>
    </nav>

    <footer>
        <p>Biblioteca Virtual © 2024</p>
    </footer>
</body>

</html>