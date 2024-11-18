<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Autor</title>
    <link rel="stylesheet" href="css/style-cadastro.css">
</head>
<body>
    <header>
        <h1>Cadastro de Autor</h1>
    </header>

    <section class="form-container">
        <h2>Cadastrar Novo Autor</h2>
        <form action="../controle/AutorControle.php" method="POST">
            <label for="nome">Nome do Autor:</label>
            <input type="text" name="nome" id="nome" required>

            <button type="submit" name="acao" value="cadastrar">Cadastrar</button>
        </form>
    </section>

    <footer>
        &copy; 2024 Biblioteca Online
    </footer>
</body>
</html>
