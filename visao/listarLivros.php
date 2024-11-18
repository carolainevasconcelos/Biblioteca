<?php
require_once '../modelo/Conexao.php';  
require_once '../modelo/ClassLivroDAO.php';

$classLivroDAO = new ClassLivroDAO();
$livros = $classLivroDAO->listarLivros();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Livros</title>
    <link rel="stylesheet" href="css/style-listar.css">
</head>
<body>

    <h1>Lista de Livros</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Ano</th>
                <th>Gênero</th>
                <th>Editora</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($livros) {
                foreach ($livros as $livro) {
                    echo "<tr>";
                    echo "<td>" . $livro['id'] . "</td>";
                    echo "<td>" . $livro['titulo'] . "</td>";
                    echo "<td>" . $livro['autor'] . "</td>";
                    echo "<td>" . $livro['ibsn'] . "</td>";
                    echo "<td>" . $livro['ano'] . "</td>";
                    echo "<td>" . $livro['genero'] . "</td>";
                    echo "<td>" . $livro['editora'] . "</td>";
                    echo "<td>" . $livro['descricao'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Nenhum livro encontrado</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="links-container">
        <a href="pagInicial.php">Voltar</a>
        <a href="cadastrarLivro.php">Cadastro</a>
    </div>
</body>
</html>
