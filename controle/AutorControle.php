<?php
require_once '../modelo/ClassAutorDAO.php';
require_once '../modelo/ClassAutor.php';

if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar') {
    $nome = $_POST['nome'];

    $autor = new ClassAutor();
    $autor->setNome($nome);

    $autorDAO = new ClassAutorDAO();
    if ($autorDAO->cadastrar($autor)) {
        // echo "Autor cadastrado com sucesso!";
        header('Location: ../visao/pagInicial.php');
        exit();
    } else {
        echo "Erro ao cadastrar autor.";
    }
}
?>
