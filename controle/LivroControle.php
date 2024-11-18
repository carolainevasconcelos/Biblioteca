<?php
require_once '../modelo/Conexao.php';
require_once '../modelo/ClassLivro.php';
require_once '../modelo/ClassLivroDAO.php';

if ($_POST['acao'] == 'cadastrar') {
    $titulo = $_POST['titulo'];
    $autorId = $_POST['autor'];  
    $ibsn = $_POST['ibsn'];
    $ano = $_POST['ano'];
    $genero = $_POST['genero'];
    $editora = $_POST['editora'];
    $descricao = $_POST['descricao'];

    $livro = new ClassLivro();
    $livro->setTitulo($titulo);
    $livro->setIbsn($ibsn);
    $livro->setAno($ano);
    $livro->setGenero($genero);
    $livro->setEditora($editora);
    $livro->setDescricao($descricao);
    $livro->setAutorId($autorId);  

    $livroDAO = new ClassLivroDAO();
    if ($livroDAO->cadastrar($livro)) {
        header('Location: ../visao/listarLivros.php');
    } else {
        echo "Erro ao cadastrar livro";
    }
}
